<?php
Route::group([],function(){
    Route::post('login','HomeController@login');
    Route::any('/logout','HomeController@logout');
    Route::get('register','HomeController@register');
    Route::get('/','HomeController@index');
    Route::get('/back','HomeController@back');
    Route::post('insertuser','HomeController@insertuser');
    Route::match(array('get','post'),'send','MailController@Sendemail');
    Route::get('feeds','HomeController@feeds');
    Route::post('ajax/{num}','AjaxController@ajax');
});
Route::group(['middleware' => 'afterAuth',],function(){
    Route::get('/','HomeController@index');
});
Route::group(['middleware' =>['auth']],function(){
    Route::group(['prefix' => 'first'],function(){
        Route::get('dashboard','HomeController@dashboard');
        Route::get('/testinsert','HomeController@testinsert');
        Route::post('json','HomeController@json');
        Route::any('/logout','HomeController@logout');
        Route::get('/back','HomeController@back');
        Route::post('search','HomeController@search');
    });
    Route::group(['prefix' => 'second'],function(){
        Route::get('dashboard','HomeController@seconddashboard');
        Route::any('/logout','HomeController@logout');
        Route::get('check','HomeController@checkit');
    });
    Route::group(['prefix' => 'third'],function(){
        Route::get('dashboard','HomeController@thirddashboard');
        Route::any('/logout','HomeController@logout');
        Route::post('submitform','HomeController@submitform');
    });
});
Route::group(['namespace' => 'Admin'],function(){
    Route::get('admin','AdminController@index');
});
