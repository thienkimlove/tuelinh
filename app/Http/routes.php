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

Route::get('/test', 'MainController@index');

Route::get('/', function () {
    $page = 'homepage';
    return view('frontend.index', compact('page'));
});

Route::get('sanpham', function () {
    $page = 'page-solution';
    return view('frontend.sanpham', compact('page'));
});

Route::get('lienhe', function () {
    $page = 'page-solution';
    return view('frontend.lienhe', compact('page'));
});

Route::get('gioithieu', function () {
    $page = 'page-solution';
    return view('frontend.gioithieu', compact('page'));
});

Route::get('thuvien', function () {
    $page = 'page-solution';
    return view('frontend.thuvien', compact('page'));
});

Route::get('tintuc', function () {
    $page = 'page-solution';
    return view('frontend.tintuc', compact('page'));
});

Route::get('tuthien', function () {
    $page = 'page-solution';
    return view('frontend.tuthien', compact('page'));
});

Route::get('tuyendung', function () {
    $page = 'page-solution';
    return view('frontend.tuyendung', compact('page'));
});





Route::get('hethongphanphoi', function () {
    $page = 'page-solution';
    return view('frontend.hethongphanphoi', compact('page'));
});

Route::get('hethongphanphoi-chitiet', function () {
    $page = 'page-solution';
    return view('frontend.hethongphanphoi-chitiet', compact('page'));
});

Route::get('tinyduoc-khoedep', function () {
    $page = 'page-solution';
    return view('frontend.tinyduoc-khoedep', compact('page'));
});

Route::get('tinyduoc-mebe', function () {
    $page = 'page-solution';
    return view('frontend.tinyduoc-mebe', compact('page'));
});

Route::get('tinyduoc-yhoccotruyen', function () {
    $page = 'page-solution';
    return view('frontend.tinyduoc-yhoccotruyen', compact('page'));
});


Route::get('tracuu-daicuongvebenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-daicuongvebenh', compact('page'));
});
Route::get('tracuu-daicuongvebenh-chitiet', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-daicuongvebenh-chitiet', compact('page'));
});

Route::get('tracuu-danhsach-timthuoctheobenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-danhsach-timthuoctheobenh', compact('page'));
});
Route::get('tracuu-danhsach-timthuoctheobenh-chitiet', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-danhsach-timthuoctheobenh-chitiet', compact('page'));
});


Route::get('tracuu-thuocnamtribenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-thuocnamtribenh', compact('page'));
});
Route::get('tracuu-thuocnamtribenh-chitiet', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-thuocnamtribenh-chitiet', compact('page'));
});

Route::get('tracuu-timthuoctheobenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-timthuoctheobenh', compact('page'));
});





Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);

Route::resource('admin/settings', 'SettingsController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/posts', 'PostsController');



Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);