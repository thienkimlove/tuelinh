<?php

namespace App\Providers;

use App;
use App\Category;
use App\Post;
use DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function($sql, $bindings) {

            for($j=0; $j<sizeof($bindings); $j++) {
                $sql = implode($bindings[$j], explode('?', $sql, 2));
            }
            $logFile = fopen(storage_path('logs/query.log'), 'a+');
            //write log to file
            fwrite($logFile, $sql . "\n");
            fclose($logFile);
        });

        view()->composer('frontend.header', function ($view) {

            $locales = [
                'en' => 'English',
                'vi' => 'Tiếng Việt',
                'fr' => 'French'
            ];

            $current = App::getLocale();
            $footerCates = Category::all();
            $ars = [];
            foreach ($footerCates as $cate) {
                 $ars[$cate->slug] = $cate->title;
            }
            $view->with(['locales' => $locales, 'current' => $current, 'cates' => $ars]);

        });

        view()->composer('frontend.footer', function ($view) {
            $footerCates = Category::where('parent_id', null)
                ->where('id', '<', 16)
                ->get();
            $view->with('footerCategories', $footerCates);

        });

        view()->composer('frontend.foot-slide', function ($view) {
            $slidePosts = Post::whereHas('modules', function($q){
                $q->where('slug', 'footer-san-pham')->orderBy('order');
            })->limit(6)->get();
            $view->with('slidePosts', $slidePosts);

        });

        view()->composer('frontend.right-noi-bat', function ($view) {
            $highlightPosts = Post::whereHas('modules', function($q){
                $q->where('slug', 'tin-tuc-noi-bat')->orderBy('order');
            })->get();
            $view->with('highlightPosts', $highlightPosts);

        });

        view()->composer('frontend.right-lien-quan', function ($view) {
            $highlightPosts = Post::whereHas('modules', function($q){
                $q->where('slug', 'tin-tuc-lien-quan')->orderBy('order');
            })->get();
            $view->with('highlightPosts', $highlightPosts);

        });


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
