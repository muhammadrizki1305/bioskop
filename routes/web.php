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

Route::get('/dummy',							'Admin\AdminManageController@dummy');

Route::group( [ 'middleware' => 'web' ], function(){
	Route::get('login',										'LoginController@showLogin')->name('login');
	Route::post('login',									'LoginController@doLogin');
	Route::get('logout',									'LoginController@doLogout');


	Route::group( ['prefix' => 'admin/manage' , 'middleware' => 'filter:auth:web'], function(){

		Route::get('/', 									'Admin\DashboardController@index');
		Route::get('/dashboard', 							'Admin\DashboardController@index');


		Route::group( ['prefix' => 'category'], function(){
			Route::get('/',									'Admin\CategoryController@index');
			Route::get('/create',							'Admin\CategoryController@create');
			Route::post('/store',							'Admin\CategoryController@store');
			Route::get('/edit/{id}',						'Admin\CategoryController@edit');
			Route::post('/update/{id}',						'Admin\CategoryController@update');
			Route::get('/destroy/{id}',						'Admin\CategoryController@destroy');
		});

		Route::group( ['prefix' => 'film'], function(){
			Route::get('/',									'Admin\FilmController@index');
			Route::get('/create',							'Admin\FilmController@create');
			Route::get('/detail/{id}',						'Admin\FilmController@detail');
			Route::get('/change/{id}',						'Admin\FilmController@change');
			Route::get('/edit/{id}',						'Admin\FilmController@edit');
			Route::post('/update/{id}',						'Admin\FilmController@update');
			Route::post('/store',							'Admin\FilmController@store');
			Route::get('/destroy/{id}',						'Admin\FilmController@destroy');
		});

		Route::group( ['prefix' => 'studio'], function(){
			Route::get('/',									'Admin\StudioController@index');
			Route::get('/create',							'Admin\StudioController@create');
			Route::get('/detail/{id}',						'Admin\StudioController@detail');
			Route::get('/change/{id}',						'Admin\StudioController@change');
			Route::get('/edit/{id}',						'Admin\StudioController@edit');
			Route::post('/update/{id}',						'Admin\StudioController@update');
			Route::post('/store',							'Admin\StudioController@store');
			Route::get('/destroy/{id}',						'Admin\StudioController@destroy');
		});

		Route::group( ['prefix' => 'row'], function(){
			Route::get('/',									'Admin\RowController@index');
			Route::get('/create',							'Admin\RowController@create');
			Route::get('/detail/{id}',						'Admin\RowController@detail');
			Route::get('/change/{id}',						'Admin\RowController@change');
			Route::get('/edit/{id}',						'Admin\RowController@edit');
			Route::post('/update/{id}',						'Admin\RowController@update');
			Route::post('/store',							'Admin\RowController@store');
			Route::get('/destroy/{id}',						'Admin\RowController@destroy');
		});

		Route::group( ['prefix' => 'chair'], function(){
			Route::get('/',									'Admin\ChairController@index');
			Route::get('/create',							'Admin\ChairController@create');
			Route::get('/detail/{id}',						'Admin\ChairController@detail');
			Route::get('/change/{id}',						'Admin\ChairController@change');
			Route::get('/edit/{id}',						'Admin\ChairController@edit');
			Route::post('/update/{id}',						'Admin\ChairController@update');
			Route::post('/store',							'Admin\ChairController@store');
			Route::get('/destroy/{id}',						'Admin\ChairController@destroy');
		});

		Route::group( ['prefix' => 'admin'], function(){
			Route::get('/',									'Admin\AdminController@index')->name('admin');
			Route::get('/create',							'Admin\AdminController@create')->name('admin.create');
			Route::post('/store',							'Admin\AdminController@store');
			Route::post('/update/{id}',						'Admin\AdminController@update');
			Route::get('/edit/{id}',						'Admin\AdminController@edit');
			Route::get('/destroy/{id}',						'Admin\AdminController@destroy');
		});

		Route::group( ['prefix' => 'operator'], function(){
			Route::get('/',									'Admin\OperatorController@index');
			Route::get('/create',							'Admin\OperatorController@create');
			Route::post('/store',							'Admin\OperatorController@store');
			Route::post('/update/{id}',						'Admin\OperatorController@update');
			Route::get('/edit/{id}',						'Admin\OperatorController@edit');
			Route::get('/destroy/{id}',						'Admin\OperatorController@destroy');
		});

		Route::group( ['prefix' => 'event'], function(){
			Route::get('/',									'Admin\EventController@index');
			Route::get('/create/{id}',						'Admin\EventController@create');
			Route::post('/store',							'Admin\EventController@store');
			Route::post('/update',							'Admin\EventController@update');
			Route::get('/edit',								'Admin\EventController@edit');
			Route::get('/destroy',							'Admin\EventController@destroy');
			Route::get('/detail',							'Admin\EventController@detail');
			Route::get('/sale',								'Admin\EventController@sale');
		});

		Route::group( ['prefix' => 'course'], function(){
			Route::get('/',									'Admin\CourseController@index');
			Route::get('/me',								'Admin\CourseController@myCourse');
			Route::get('/all',								'Admin\CourseController@allCourse');
			Route::get('/create',							'Admin\CourseController@create');
			Route::post('/store',							'Admin\CourseController@store');

			Route::group( ['prefix' => '{course_id}/playlist'], function(){
				Route::get('/',								'Admin\PlaylistController@index');
				Route::get('/create',						'Admin\PlaylistController@create');
				Route::post('/store-video',					'Admin\PlaylistController@storeVideo');
				Route::post('/store',						'Admin\PlaylistController@store');
				Route::get('/delete/{playlist_id}',					'Admin\PlaylistController@destroy');
			});

		});

		Route::group( ['prefix' => 'email'], function(){
			Route::get('/compose',							'Admin\EmailController@create');

			Route::post('/store',							'Admin\EmailController@store');
			Route::get('/',									'Admin\EmailController@index');
			
			Route::get('/subscriber',						'Admin\EmailController@subscriberList');
			Route::get('/feedback',							'Admin\EmailController@feedbackList');
		});

		Route::group( ['prefix' => 'comments'], function(){

		});

		Route::group( ['prefix' => 'user'], function(){
			Route::get('/',									'Admin\UserController@index');
		});

		Route::group( ['prefix' => 'about'], function(){

		});
	});
});
