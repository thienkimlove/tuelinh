<?php

namespace App\Http\Controllers;
use App\City;
use App\Contact;
use App\Delivery;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MainController extends Controller
{
    /**
     * Them tinh thanh hay san pham vao cuoi cung cua mang? sau do run
     * tuelinh.vn/import-phan-phoi
     */
    public function import(){

        $provinces = array(
            'Hải Phòng','Huế',
            'Đắk Lắk', 'Cần Thơ', 'Phú Yên',
            'Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng',
            'An Giang', 'Bà Rịa - Vũng Tàu',
            'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu',
            'Bắc Ninh', 'Bến Tre', 'Bình Định',
            'Bình Dương', 'Bình Phước', 'Bình Thuận',
            'Cà Mau', 'Cao Bằng', 'Yên Bái',
            'Đắk Nông', 'Điện Biên', 'Đồng Nai',
            'Đồng Tháp', 'Gia Lai', 'Hà Giang',
            'Hà Nam', 'Hà Tĩnh', 'Hải Dương',
            'Hậu Giang', 'Hòa Bình', 'Hưng Yên',
            'Khánh Hòa', 'Kiên Giang', 'Kon Tum',
            'Lai Châu', 'Lâm Đồng', 'Lạng Sơn',
            'Lào Cai', 'Long An', 'Nam Định',
            'Nghệ An', 'Ninh Bình', 'Ninh Thuận',
            'Phú Thọ', 'Quảng Bình', 'Quảng Nam',
            'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị',
            'Sóc Trăng', 'Sơn La', 'Tây Ninh',
            'Thái Bình', 'Thái Nguyên', 'Thanh Hóa',
            'Thừa Thiên Huế', 'Tiền Giang', 'Trà Vinh',
            'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc',
        );

        DB::statement('TRUNCATE table cities');
        foreach ($provinces as $pro) {
            DB::table('cities')->insert([
                'name' => $pro
            ]);
        }

        $products = [
            'Dưỡng thận Tuệ Linh',
            'Trà Giảo Cổ Lam',
            'Trà Giải Độc Gan',
            'Cà gai leo Tuệ Linh',
        ];

        DB::statement('TRUNCATE table products');

        foreach ($products as $pro) {
            DB::table('products')->insert([
                'name' => $pro
            ]);
        }

    }

    /**
     * save contact form.
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveContact(ContactRequest $request)
    {
        Contact::create($request->all());
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private function _fillPosts()
    {
        $data = [];
        $posts = DB::connection('mysql2')->select('select * from tu81_posts where post_type="posts"');
        foreach ($posts as $post) {
            $data['title'] = $post->post_title;
            $data['content'] = $post->post_content;
            $data['display_id'] = $post->ID;
            $data['created_at'] = $post->post_date;
            $data['updated_at'] = $post->post_modified;

            $avatar = DB::connection('mysql2')->select('select * from tu81_posts where post_type="attachment" and ID="'.$post->ID.'" limit 1');
            if ($avatar) {
                $data['image'] = $avatar->guid;
            }
            $meta = DB::connection('mysql2')->select('select * from tu81_postmeta where post_id="'.$post->ID.'"');
            foreach ($meta as $tag) {
                if ($tag->meta_key == '_yoast_wpseo_metakeywords') {
                    $data['keyword'] = $tag->meta_value;
                }
            }
            $term = DB::connection('mysql2')->select('SELECT t2.* FROM  tu81_term_relationships t1, tu81_term_taxonomy t2 WHERE t1.term_taxonomy_id = t2.term_taxonomy_id AND  t1.object_id = "'.$post->ID.'" AND t2.taxonomy = "category" ')->first();
            $data['category_id'] = $term->id;
        }
    }

    private function fillCategory()
    {
        $data = [];
        $query = "SELECT t1 . * , t2.parent
                    FROM  tu81_terms t1, tu81_term_taxonomy t2
                    WHERE t1.term_id = t2.term_id
                    AND taxonomy =  'category'";
        $categories = DB::connection('mysql2')->select($query);
        foreach ($categories as $cate) {

        }
    }

    public function index()
    {



    }

}
