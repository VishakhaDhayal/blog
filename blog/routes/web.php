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

Route::get('/test', function () {
    return App\Profile::find(1)->user;
});

Route::get('/',[
	'uses'=>'FrontEndController@index',
	'as'  => 'index'
]);
Route::get('/todos', [
	'uses'=>'TodosController@index'
]);
Route::get('/todo/delete/{id}', [
	'uses'=>'TodosController@delete',
	'as'=>'todos.delete'
]);
Route::get('/todo/update/{id}',[
	'uses'=>'TodosController@update',
	'as'=>'todos.update'
]);

Route::post('/create-todo', [
	'uses'=>'TodosController@store'
]);
Route::post('/todo/save/{id}', [
	'uses'=>'TodosController@save',
	'as'=>'todos.save'
]);

Auth::routes();


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/post/create',[
		'uses'=>'PostController@create',
		'as'=>'post.create'
	]);

	Route::post('/post/store',[
		'uses'=>'PostController@store',
		'as'=>'post.store'
	]);

	Route::get('/posts',[
		'uses'=>'PostController@index',
		'as'=>'posts'
	]);
	Route::get('/post/edit/{id}',[
		'uses'=>'PostController@edit',
		'as'=>'post.edit'
	]);
	Route::post('/post/update/{id}',[
		'uses'=>'PostController@update',
		'as'=>'post.update'
	]);
	Route::get('/post/delete/{id}',[
		'uses'=>'PostController@destroy',
		'as'=>'post.delete'
	]);
	Route::get('post/trashed',[
		'uses'=>'PostController@trashed',
		'as'=>'post.trashed'
	]);
	Route::get('post/restore/{id}',[
		'uses'=>'PostController@restore',
		'as'=>'post.restore'
	]);

	Route::get('post/trash/{id}',[
		'uses'=>'PostController@trash',
		'as'=>'post.trash'
	]);
	Route::get('/category',[
		'uses'=>'CategoryController@index',
		'as'=>'category.index'
	]);

	Route::get('/category/create',[
		'uses'=>'CategoryController@create',
		'as'=>'category.create'
	]);

	Route::post('/category/store',[
		'uses'=>'CategoryController@store',
		'as'=>'category.store'
	]);


	Route::get('/category/edit/{id}',[
		'uses'=>'CategoryController@edit',
		'as'=>'category.edit'
	]);

	Route::post('/category/update/{id}',[
		'uses'=>'CategoryController@update',
		'as'=>'category.update'
	]);


	Route::get('/category/delete/{id}',[
		'uses'=>'CategoryController@destroy',
		'as'=>'category.delete'
	]);

	Route::get('/tags',[
		'uses' => 'TagController@index',
		'as'   =>  'tags'
	]);

	Route::get('/tags/create',[
		'uses' => 'TagController@create',
		'as'   =>  'tags.create'
	]);

	Route::post('/tags/store',[
		'uses' => 'TagController@store',
		'as'   =>  'tags.store'
	]);


	Route::get('/users', [
		'uses'	=>	'UserController@index',
		'as'	=>	'users'
	]);

	Route::get('/users/create', [
		'uses'	=>	'UserController@create',
		'as'	=>	'users.create'
	]);
	Route::post('/users/store', [
		'uses'	=>	'UserController@store',
		'as'	=>	'users.store'
	]);
	Route::get('/users/admin/{id}', [
		'uses'	=>	'UserController@admin',
		'as'	=>	'users.admin'
	]);
	Route::get('/users/not-admin/{id}', [
		'uses'	=>	'UserController@not_admin',
		'as'	=>	'users.not.admin'
	]);
	Route::get('/users/delete/{id}', [
		'uses'	=>	'UserController@destroy',
		'as'	=>	'users.delete'
	]);

	Route::get('/settings',[
		'uses'	=>	'SettingsController@index',
		'as'	=>	'settings'
	]);
	Route::post('/settings/update',[
		'uses'	=>	'SettingsController@update',
		'as'	=>	'settings.update'
	]);
});


Route::get('/post/{slug}',[
	'uses'	=>	'FrontEndController@singlePost',
	'as'	=>	'post.single'
]);

Route::get('/category/{id}',[
	'uses'	=>	'FrontEndController@category',
	'as'	=>	'category'
]);

Route::post('/results',[
	'uses'	=>	'FrontEndController@searchResults',
	'as'	=>	'search'
]);
