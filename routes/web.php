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

Route::post('response', 'ResponseController@store');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/surveys', function () {
    return view('surveys');
});

Route::get('/answer', function () {
    return view('answer');
});

Route::get('/payments', function () {
    return view('payments');
});

Route::get('/survey_list', function () {
    return view('survey_list');
});

Route::post('/survey', 'SurveyController@store');
Route::get('/survey/create', 'SurveyController@create');
Route::get('/survey/{survey}', 'SurveyController@show');
Route::get('/question/{question}', 'QuestionController@show');
Route::get('/stat/{survey}', 'QuestionController@index');
Route::get('summary/{survey}', 'QuestionController@summary');
