<?php
/**
 * Created by PhpStorm.
 * User: smartworld
 * Date: 5/27/20
 * Time: 12:48 PM
 */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/faq', 'FAQController@index');
Route::post('/faq/question/{faq}/{type?}', 'FAQController@incrementClick');

Route::group(['namespace' => 'FAQ'], function () {
    Route::resource('/faqs/categories', 'CategoriesController');
    Route::get('faqs/order', 'OrderController@index');
    Route::post('faqs/order', 'OrderController@updateOrder');
    Route::resource('/faqs', 'FaqsController');
});