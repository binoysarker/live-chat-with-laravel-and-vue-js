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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::resource('/chat','ChatController');
Route::post('/send','ChatController@send');

Route::get('/check',function (){
    return session('check');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
 *Phonebook section
 */

Route::resource('/phonebook','PhonebookController');

/*Route::get('/phonebook/{name}',function (){
    return redirect('/');
})->where('name','[A-Za-z]+');*/

Route::get('/getData','PhonebookController@getData');