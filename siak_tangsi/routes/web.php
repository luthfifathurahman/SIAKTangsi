<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(array('GET','POST'),'/backend/login','Backend\LoginController@index');

/* SUPER ADMIN */
Route::group(array('prefix' => 'backend','middleware'=> ['token_super_admin']), function()
{

	Route::get('/modules','Backend\ModuleController@index');
    Route::get('/modules/{id}','Backend\ModuleController@show');

	Route::get('/module/tambah','Backend\ModuleController@create');
	Route::post('/modules','Backend\ModuleController@store');
	Route::delete('/modules/hapus/{id}','Backend\ModuleController@destroy');
	
	Route::get('/modules/{id}/ubah','Backend\ModuleController@edit');
	Route::match(array('PUT','PATCH'),'/modules/{id}','Backend\ModuleController@update');

	Route::get('/datatable/modules','Backend\ModuleController@datatable');
});

/* ACCESS CONTROL EDIT */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin', 'token_edit']), function()
{
	Route::get('/users-level/{id}/ubah','Backend\UserLevelController@edit');
	Route::match(array('PUT','PATCH'),'/users-level/{id}','Backend\UserLevelController@update');

	Route::get('/users-user/{id}/ubah','Backend\UserController@edit');
    Route::match(array('PUT','PATCH'),'/users-user/{id}','Backend\UserController@update');

	Route::get('/keluarga/{id}/ubah','Backend\KeluargaController@edit');
	Route::match(array('PUT','PATCH'),'/keluarga/{id}','Backend\KeluargaController@update');
    
	Route::get('/penduduk/{id}/ubah','Backend\PendudukController@edit');
	Route::match(array('PUT','PATCH'),'/penduduk/{id}','Backend\PendudukController@update');

	Route::get('/pindah/{id}/ubah','Backend\PindahController@edit');
	Route::match(array('PUT','PATCH'),'/pindah/{id}','Backend\PindahController@update');

	Route::get('/meninggal/{id}/ubah','Backend\MeninggalController@edit');
	Route::match(array('PUT','PATCH'),'/meninggal/{id}','Backend\MeninggalController@update');

});

/* ACCESS CONTROL ALL */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin', 'token_all']), function()
{
	Route::get('/users-level/tambah','Backend\UserLevelController@create');
	Route::post('/users-level','Backend\UserLevelController@store');
	Route::delete('/users-level/{id}','Backend\UserLevelController@destroy');
	
	Route::get('/users-user/tambah','Backend\UserController@create');
	Route::post('/users-user','Backend\UserController@store');
    Route::delete('/users-user/{id}','Backend\UserController@destroy');
    Route::post('/users-user/delete','Backend\UserController@deleteAll');

	Route::get('/media-library/upload','Backend\MediaLibraryController@upload');
	Route::post('/media-library/upload','Backend\MediaLibraryController@upload');	
    Route::delete('/media-library/{id}','Backend\MediaLibraryController@destroy');
    Route::post('/media-library','Backend\MediaLibraryController@deleteAll');

	Route::get('/keluarga/tambah','Backend\KeluargaController@create');
	Route::post('/keluarga','Backend\KeluargaController@store');
	Route::get('/keluarga/hapus/{id}','Backend\KeluargaController@destroy');
    
	Route::get('/penduduk/tambah','Backend\PendudukController@create');
	Route::post('/penduduk','Backend\PendudukController@store');
	Route::get('/penduduk/hapus/{id}','Backend\PendudukController@destroy');

	Route::get('/pindah/tambah','Backend\PindahController@create');
	Route::post('/pindah','Backend\PindahController@store');
	Route::get('/pindah/hapus/{id}','Backend\PindahController@destroy');

	Route::get('/meninggal/tambah','Backend\MeninggalController@create');
	Route::post('/meninggal','Backend\MeninggalController@store');
	Route::get('/meninggal/hapus/{id}','Backend\MeninggalController@destroy');

});

/* ACCESS CONTROL VIEW */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin']), function()
{
	Route::get('',function (){return Redirect::to('backend/dashboard');});
	Route::get('/logout','Backend\LoginController@logout');
	
	Route::get('/dashboard','Backend\DashboardController@dashboard');

	Route::get('/users-level/datatable','Backend\UserLevelController@datatable');	
	Route::get('/users-level','Backend\UserLevelController@index');
	Route::get('/users-level/{id}','Backend\UserLevelController@show');
	
	Route::get('/users-user/datatable','Backend\UserController@datatable');
	Route::get('/users-user','Backend\UserController@index');
	Route::get('/users-user/{id}','Backend\UserController@show');
    Route::get('/user/export/{type}','ExcelController@export_user');

	Route::get('/media-library/datatable/','Backend\MediaLibraryController@datatable');
	Route::get('/media-library','Backend\MediaLibraryController@index');
	Route::get('/media-library/popup-media/1/1','Backend\MediaLibraryController@popup_media_gallery');
	Route::get('/media-library/popup-media/{from}/{id_count}','Backend\MediaLibraryController@popup_media');
    Route::get('/media-library/popup-media-gallery/','Backend\MediaLibraryController@popup_media_gallery');
    Route::get('/media-library/popup-media-editor/{id_count}','Backend\MediaLibraryController@popup_media_editor');
	
	Route::get('/access-control','Backend\AccessControlController@index');
	Route::post('/access-control','Backend\AccessControlController@update');

	Route::get('/setting','Backend\SettingController@index');
	Route::post('/setting','Backend\SettingController@update');
    
	Route::get('/keluarga/datatable','Backend\KeluargaController@datatable');
	Route::get('/keluarga','Backend\KeluargaController@index');
	Route::get('/keluarga/{id}','Backend\KeluargaController@show');
    
	Route::get('/penduduk/datatable','Backend\PendudukController@datatable');
	Route::get('/penduduk','Backend\PendudukController@index');
    Route::get('/penduduk/{id}','Backend\PendudukController@show');

	Route::get('/pindah/datatable','Backend\PindahController@datatable');
	Route::get('/pindah','Backend\PindahController@index');
    Route::get('/pindah/{id}','Backend\PindahController@show');

	Route::get('/meninggal/datatable','Backend\MeninggalController@datatable');
	Route::get('/meninggal','Backend\MeninggalController@index');
    Route::get('/meninggal/{id}','Backend\MeninggalController@show');

	Route::get('/statistik-penduduk','Backend\LaporanPendudukController@penduduk');
	Route::get('/statistik-pindah','Backend\LaporanPendudukController@pindah');
	Route::get('/statistik-meninggal','Backend\LaporanPendudukController@meninggal');

});