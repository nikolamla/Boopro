<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;

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
    return view('welcome', [
        'heading' => 'Ovo je lista',
        'items' => [
            [
                'id' => 1,
                'name' => 'Prvi',
                'desc'=>'Samo je prvi prvi'
            ],
            [
                'id'=>2,
                'name'=>'Drugi',
                'desc' => 'Ja sam drugi'
            ]
        ]
    ]);
});

Route::get('/score', 'ScoreController@getScore');
