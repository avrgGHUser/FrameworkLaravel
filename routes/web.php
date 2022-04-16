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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-name', function () {
    return ('Микшаков Дмитрий Олегович');
});
Route::get('/my-friend{name}', function ($name) {
    return ('BLANK');
});
Route::get('/get-friend/name{name}', function ($name) {
    return ($name);
});

Route::get('/my-city/{city}', function ($city) {
    return $city;
})->where('city', '[A-Za-z]+');


Route::get('/level/{lvl}', function ($lvl) {
    if($lvl>=0 && $lvl<=25)
    echo 'Новичок';
    elseif($lvl>=26 && $lvl<=50) echo 'Специалист';
    elseif($lvl>=51 && $lvl<=75) echo 'Босс';
    elseif($lvl>=76 && $lvl<=98) echo 'Старик';
    elseif($lvl==99) echo 'Король';
});
Route::get('/working/{name}/{date}', function ($name, $date) {
    return $name . "<br>" . $date;
})->where('date', '[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])');

Route::get('/power', function () {
})->name('power');
Route::get('/test', function () {
    return route('power');});

Route::prefix('/admin')->group(function () {
Route::get('/login', function (){
        return "Admin's login";});

Route::get('/logout', function (){
        return "Admin's logout";});

Route::get('/info', function (){
        return "Admin's info";});

Route::get('/color', function (){
        return "Admin's color";});

Route::redirect('/web', 'color');});

Route::get('/color/{hex}', function ()
{})->where('hex', '[0-9a-fA-F]{6}+');
