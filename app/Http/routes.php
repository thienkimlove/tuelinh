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
use App\Setting;
use Illuminate\Support\Str;



Route::get('/', function () {
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);

    $page = 'homepage';

    $news = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'tin-tuc-trang-chu')->orderBy('order');
    })->limit(8)->get();

    $charities = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'tu-thien-trang-chu')->orderBy('order');
    })->limit(4)->get();

    $friends = \App\Friend::limit(10)->get();
    $awards = \App\Award::limit(10)->get();


    $products = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'san-pham-trang-chu')->orderBy('order');
    })->paginate(8);

    $forms = Post::where('status', true)->whereHas('modules', function($q){
        $q->where('slug', 'chuan-hoa-nguyen-lieu')->orderBy('order');
    })->limit(4)->get();


    return view('frontend.index', compact('page', 'news', 'products', 'forms', 'charities', 'friends', 'awards'))->with('meta_title', 'Trang chủ | Tuệ Linh');
});

Route::get('language/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect(Request::input('return'));
});

Route::get('home', function () {
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);
    $page = 'homepage';
    return view('frontend.index', compact('page'));
});

Route::resource('admin/settings', 'SettingsController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/posts', 'PostsController');
Route::resource('admin/deliveries', 'DeliveriesController');
Route::resource('admin/friends', 'FriendsController');
Route::resource('admin/awards', 'AwardsController');


Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);

Route::get('import-phan-phoi', 'MainController@import');
Route::get('replace', 'MainController@replace');
Route::post('saveContact', ['as' => 'saveContact', 'uses' => 'MainController@saveContact']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('he-thong-phan-phoi/{product}/{city}', function($product_id, $city_id){
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);
    $page = 'page-solution';
    $deliveries = \App\Delivery::where('city_id', $city_id)
        ->where('product_id', $product_id)
        ->get();
    $city = \App\City::find($city_id);
    $product = \App\Product::find($product_id);

    return view('frontend.hethongphanphoi-chitiet', compact('page', 'deliveries', 'city', 'product'))->with('meta_title', 'Hệ thống phân phối | Tuệ Linh');
});

Route::get('tag/{value}', function($value){
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);
    $page = 'page-solution';
    $tag = \App\Tag::where('slug', $value)->first();
    $posts = Post::whereHas('tags', function($q) use($tag){
        $q->where('id', $tag->id);
    })->paginate(9);
    return view('frontend.tag', compact('page', 'tag', 'posts'))->with('meta_title', 'Từ khóa | Tuệ Linh');
});

Route::get('/{value}', function ($value) {
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);
    $page = 'page-solution';
    if ($value == 'lien-he') {
        $departments = [
            'Marketing',
            'Hành Chính Nhân Sự',
            'Kế Toán',
            'Quản trị bán hàng'
        ];
        return view('frontend.lien-he', compact('page', 'departments'))->with('meta_title', 'Liên hệ | Tuệ Linh');
    } elseif ($value == 'tin-tuc') {
        $category = \App\Category::where('slug', 'tin-tuc')->first();

        $posts = Post::whereIn('category_id', $category->subCategories->lists('id'))
            ->latest('updated_at')
            ->paginate(15);

        return view('frontend.tin-tuc', compact('page', 'posts'))->with('meta_title', 'Tin tức | Tuệ Linh');

    } elseif ($value == 'he-thong-phan-phoi') {

        $city_ids = DB::table('deliveries')
            ->select(DB::raw('DISTINCT(city_id) as ids'))
            ->where('city_id', '>', 0)
            ->lists('ids');

        $product_ids = DB::table('deliveries')
            ->select(DB::raw('DISTINCT(product_id) as ids'))
            ->where('product_id', '>', 0)
            ->lists('ids');

        $products = \App\Product::whereIn('id', $product_ids)->lists('name', 'id');
        $cities = \App\City::whereIn('id', $city_ids)->lists('name', 'id');

        return view('frontend.he-thong-phan-phoi', compact('page', 'products', 'cities'))->with('meta_title', 'Hệ thống phân phối | Tuệ Linh');

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

        $banner = Setting::where('name', 'banner_chitiet')->first()->value;
        $meta_image = url('cache/256x256',  \App\ImageReverse::img($post->image));

        return view('frontend.details', compact('meta_image','page', 'banner', 'post', 'relatePosts', 'tuelinh', 'currentTuelinh'))->with('meta_title', $post->title.' | Tuệ Linh');
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
                return view('frontend.san-pham', compact('page', 'category', 'posts', 'tags'))->with('meta_title', 'Sản phẩm | Tuệ Linh');

            } elseif (in_array($category->slug, ['dai-cuong-ve-benh', 'thuoc-nam-tri-benh', 'tim-thuoc-theo-benh'])) {
                $posts = Post::where('category_id', $category->id)
                    ->latest('updated_at')
                    ->paginate(50);

                $list = Post::whereHas('modules', function($q) use ($category){
                    $q->where('slug', $category->slug)->orderBy('order');
                })->get();

                return view('frontend.tra-cuu', compact('page', 'category', 'posts', 'list'))->with('meta_title', 'Tra cứu | Tuệ Linh');

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
            return view('frontend.details', compact('page', 'post', 'relatePosts', 'tuelinh', 'currentTuelinh'))->with('meta_title', 'Giới thiệu | Tuệ Linh');
        }

    }
});

Route::get('{value1}/{value2}', function($value1, $value2) {
    $locale = (session('locale'))? session('locale') : 'vi';
    App::setLocale($locale);
    $page = 'page-solution';
    $category = \App\Category::where('slug', $value2)->first();
    if (in_array($category->slug, ['me-va-be', 'y-hoc-co-truyen', 'khoe-va-dep'])) {
        $posts = Post::where('category_id', $category->id)
            ->latest('updated_at')
            ->paginate(15);
        return view('frontend.tin-y-duoc', compact('page', 'category', 'posts'))->with('meta_title', 'Tin y dược | Tuệ Linh');

    } elseif (in_array($category->slug, ['hoat-dong-tu-thien', 'tin-tuyen-dung', 'thu-vien'])) {
        $posts = Post::where('category_id', $category->id)
            ->latest('updated_at')
            ->paginate(15);
        return view('frontend.tin-tuc', compact('page', 'posts', 'category'))->with('meta_title', 'Tin tức | Tuệ Linh');
    }
});


