<?php

Route::group(['namespace' => 'Frontend'], function()
{
    
    Route::get('/{lang?}', ['as' => 'home', 'uses' => 'HomeController@index']);        
    Route::get('{lang}/{slug}-{id}.html', ['as' => 'detail', 'uses' => 'DetailController@index']); 
    Route::get('{lang}/{slug}.html', ['as' => 'pages', 'uses' => 'PageController@index']);
    Route::get('{lang}/news', ['as' => 'news', 'uses' => 'NewsController@index']);
    Route::get('{lang}/contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::get('{lang}/{slug}', ['as' => 'cates', 'uses' => 'CateController@index']);
    Route::get('/lang/set-lang', ['as' => 'set-lang', 'uses' => 'HomeController@setLang']);
Route::post('/send-contact', ['as' => 'send-contact', 'uses' => 'ContactController@store']);
    Route::get('/{slug}', ['as' => 'danh-muc-cha', 'uses' => 'CateController@index']);
 
    Route::get('{lang}/news/{slug}-{id}.html', ['as' => 'news-detail', 'uses' => 'NewsController@detail']);
    Route::get('news/{slug}-{id}.html', ['as' => 'news-detail-en', 'uses' => 'NewsController@detail']);
   
    Route::get('{slugLoaiSp}/{slug}/', ['as' => 'danh-muc-con', 'uses' => 'CateController@cate']);    
    
    Route::get('/tim-kiem.html', ['as' => 'search', 'uses' => 'HomeController@search']);   
    

    

   
    Route::post('/get-district', ['as' => 'get-district', 'uses' => 'DistrictController@getDistrict']);
    Route::post('/get-ward', ['as' => 'get-ward', 'uses' => 'WardController@getWard']);
    Route::post('/customer/update', ['as' => 'update-customer', 'uses' => 'CustomerController@update']);
    Route::post('/customer/register', ['as' => 'register-customer', 'uses' => 'CustomerController@register']);
    Route::post('/customer/register-ajax', ['as' => 'register-customer-ajax', 'uses' => 'CustomerController@registerAjax']);
    Route::post('/customer/checkemail', ['as' => 'checkemail-customer', 'uses' => 'CustomerController@isEmailExist']);    
});