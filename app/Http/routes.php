<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use Illuminate\Support\Str;


Route::get('/', function () {
    $page = 'homepage';


    $news = Post::where('category_id', 8)
        ->latest('updated_at')
        ->limit(8)
        ->get();

    $charities = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'tu-thien-trang-chu')->orderBy('order');
    })->limit(4)->get();

    $friends = \App\Friend::limit(4)->get();


    $products = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'san-pham-trang-chu')->orderBy('order');
    })->paginate(8);

    $forms = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'chuan-hoa-nguyen-lieu')->orderBy('order');
    })->limit(4)->get();


    return view('frontend.index', compact('page', 'news', 'products', 'forms', 'charities', 'friends'));
});

Route::get('home', function () {
    $page = 'homepage';
    return view('frontend.index', compact('page'));
});

Route::resource('admin/settings', 'SettingsController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/posts', 'PostsController');
Route::resource('admin/deliveries', 'DeliveriesController');
Route::resource('admin/friends', 'FriendsController');


Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('he-thong-phan-phoi/{value}', function($value){
    $page = 'page-solution';
    $deliveries = \App\Delivery::where('slug', $value)->get();
    return view('frontend.hethongphanphoi-chitiet', compact('page', 'deliveries'));
});

Route::get('tag/{value}', function($value){
    $page = 'page-solution';
    $tag = \App\Tag::where('slug', $value)->first();
    $posts = Post::whereHas('tags', function($q) use($tag){
        $q->where('id', $tag->id);
    })->paginate(9);
    return view('frontend.tag', compact('page', 'tag', 'posts'));
});

Route::get('/{value}', function ($value) {
    $page = 'page-solution';
    if ($value == 'lien-he') {
        return view('frontend.lien-he', compact('page'));
    } elseif ($value == 'tin-tuc') {
        $category = \App\Category::where('slug', 'tin-tuc')->first();

        $posts = Post::whereIn('category_id', $category->subCategories->lists('id'))
            ->latest('updated_at')
            ->paginate(16);

        return view('frontend.tin-tuc', compact('page', 'posts'));

    } elseif ($value == 'he-thong-phan-phoi') {
        $deliveries = \App\Delivery::all();
        $cities = [];
        $area = array(
            array('name' => 'Miền Bắc', 'elements' => array()),
            array('name' => 'Miền Trung', 'elements' => array()),
            array('name' => 'Miền Nam', 'elements' => array()),
        );
        foreach ($deliveries as $delivery) {
            if ($delivery->area == 'Miền Bắc' && !in_array($delivery->city, $area[0]['elements'])) {
                $area[0]['elements'][] = $delivery->city;
            }
            if ($delivery->area == 'Miền Trung' && !in_array($delivery->city, $area[1]['elements'])) {
                $area[1]['elements'][] = $delivery->city;
            }
            if ($delivery->area == 'Miền Nam' && !in_array($delivery->city, $area[2]['elements'])) {
                $area[2]['elements'][] = $delivery->city;
            }
            if (!in_array($delivery->city, $cities)) {
                $cities[] = $delivery->city;
            }
        }
        return view('frontend.he-thong-phan-phoi', compact('page', 'area', 'cities'));

    }  elseif (preg_match('/[a-z0-9\-]+-(\d+)/', $value, $matches)) {
        //posts
        $post = Post::find($matches[1]);
        $tuelinh = Post::whereHas('category', function($q){
            $q->where('slug', 'tue-linh');
        })->get();


        $relatePosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('updated_at')
            ->limit(6)
            ->get();

        $currentTuelinh = null;

        return view('frontend.details', compact('page', 'post', 'relatePosts', 'tuelinh', 'currentTuelinh'));
    }  else {
        if (in_array($value, ['dai-cuong-ve-benh', 'thuoc-nam-tri-benh', 'tim-thuoc-theo-benh', 'san-pham'])) {
            //parent_categories.
            $category = \App\Category::where('slug', $value)->first();
            if ($category->slug == 'san-pham') {

                $posts = Post::where('category_id', $category->id)->latest('updated_at')->paginate(9);
                //get all tags
                $tags = \App\Tag::whereHas('posts', function($q) use ($category) {
                    $q->where('category_id', $category->id);
                })->get();
                return view('frontend.san-pham', compact('page', 'category', 'posts', 'tags'));

            } elseif (in_array($category->slug, ['dai-cuong-ve-benh', 'thuoc-nam-tri-benh', 'tim-thuoc-theo-benh'])) {
                $posts = Post::where('category_id', $category->id)
                    ->latest('updated_at')
                    ->get();

                $list = Post::whereHas('modules', function($q) use ($category){
                    $q->where('slug', $category->slug)->orderBy('order');
                })->get();

                return view('frontend.tra-cuu', compact('page', 'category', 'posts', 'list'));

            }
        } else {
            //posts tuelinh menu

            $tuelinh = Post::whereHas('category', function($q){
                $q->where('slug', 'tue-linh');
            })->get();
            foreach ($tuelinh as $tPost) {
                if (Str::slug($tPost->title) == $value) {
                    $post = $tPost;
                }
            }

            $relatePosts = Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->latest('updated_at')
                ->limit(6)
                ->get();

            $currentTuelinh = $value;
            return view('frontend.details', compact('page', 'post', 'relatePosts', 'tuelinh', 'currentTuelinh'));
        }

    }
});

Route::get('{value1}/{value2}', function($value1, $value2) {
    $page = 'page-solution';
    $category = \App\Category::where('slug', $value2)->first();
    if (in_array($category->slug, ['me-va-be', 'y-hoc-co-truyen', 'khoe-va-dep'])) {
        $posts = Post::where('category_id', $category->id)
            ->latest('updated_at')
            ->paginate(16);
        return view('frontend.tin-y-duoc', compact('page', 'category', 'posts'));

    } elseif (in_array($category->slug, ['tu-thien', 'tin-tuyen-dung', 'thu-vien'])) {
        $posts = Post::where('category_id', $category->id)
            ->latest('updated_at')
            ->paginate(16);
        return view('frontend.tin-tuc', compact('page', 'posts', 'category'));
    }
});


