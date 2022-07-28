<?php

use Illuminate\Support\Facades\Route;

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

/**Route::get('/', function () {
    return view('welcome');
}); */
//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
   // Route::resource('livros', 'LivroController');



//});

Route::group(['namespace' => 'Admin',
            'prefix' => 'admin',
            'middleware' => 'auth'], function() {
    Route::resource('livros', 'LivroController');
    Route::match(['get','post'],'listar_livros', 'LivroController@listarLivros')->name('livros.listarLivros');

    Route::resource('user', 'UserController');
    Route::get('logout','UserController@logout')->name('user.logout');

    Route::resource('rodape', 'RodapeController');

    Route::get('/', 'DashboardController@index')->name('admin.home.index');

     /** Logout*/
   //  Route::get('logout', 'AuthController@logout')->name('logout');

});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
