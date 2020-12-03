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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');

Route::get('/test', function () {
    //$user = User::find(2);

    //$user->roles()->sync([2]);

    Gate::authorize("haveaccess", 'role.index');

});
