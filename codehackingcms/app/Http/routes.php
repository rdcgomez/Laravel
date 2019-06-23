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
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');



// Route::get('/helper', function () {
    
//     $path = public_path('images');
//     return dd($path);

// });

// Route::get('/collection', function () {

//     $path = public_path();
//    return dd($path);
    
Route::get('/post/{id}', ['as' => 'home.post', 'uses'=>'AdminPostsController@post'] );


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    // Route::any('/{id}', 'AdminUsersController@show');
    Route::get('/', function () {
        return view('/admin/index');
    });

    Route::resource('/users', 'AdminUsersController');

    Route::resource('/posts', 'AdminPostsController');

    Route::resource('/categories', 'AdminCategoriesController');
    
    Route::resource('/media', 'AdminMediasController');

    Route::resource('/comments', 'PostCommentsController');

    Route::resource('/comment/replies', 'CommentRepliesController');

  
});

    



