<?php

use App\Parser\Parser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return Parser::parse('../public/data/posts.json');

    // return Parser::driver('csv')->parse('../public/data/survey-2021.csv');

    return Parser::driver('xml')->parse('../public/data/books.xml');
});
