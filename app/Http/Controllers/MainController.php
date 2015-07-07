<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
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
