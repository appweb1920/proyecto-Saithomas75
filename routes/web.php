<?php

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Permisos\Models\Permission;
use App\Permisos\Models\Role;

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
    return view('test');
});

//Route::get('/test', function () {
//    return view('test');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController', ['except'=>['create', 'store']])->names('user');

Route::get('/post/searchIndex', 'PostController@searchIndex')->name('post.search');

Route::get('/post/navigate', 'PostController@navigate')->name('post.navigate');

Route::resource('/post', 'PostController')->names('post');

Route::resource('/comment', 'CommentController')->names('comment');


