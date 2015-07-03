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

Route::get('/', function () {
    $page = 'homepage';
    return view('frontend.index', compact('page'));
});

Route::get('product', function () {
    $page = 'page-solution';
    return view('frontend.product', compact('page'));
});

Route::get('contact', function () {
    $page = 'page-solution';
    return view('frontend.contact', compact('page'));
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



Route::get('delivery-system', function () {
    $page = 'page-solution';
    return view('frontend.delivery-system', compact('page'));
});

Route::get('delivery-system-detail', function () {
    $page = 'page-solution';
    return view('frontend.delivery-system-detail', compact('page'));
});

Route::get('khoe-dep', function () {
    $page = 'page-solution';
    return view('frontend.khoe-dep', compact('page'));
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
Route::get('tracuu-daicuongvebenh-detail', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-daicuongvebenh-detail', compact('page'));
});

Route::get('tracuu-danhsach-timthuoctheobenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-danhsach-timthuoctheobenh', compact('page'));
});
Route::get('tracuu-danhsach-timthuoctheobenh-detail', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-danhsach-timthuoctheobenh-detail', compact('page'));
});


Route::get('tracuu-thuocnamtribenh', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-thuocnamtribenh', compact('page'));
});
Route::get('tracuu-thuocnamtribenh-detail', function () {
    $page = 'page-solution';
    return view('frontend.tracuu-thuocnamtribenh-detail', compact('page'));
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



Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);