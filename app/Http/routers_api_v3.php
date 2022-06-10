<?php

Route::group(['prefix' => 'api/v0.3'], function () {
    // Route::post('/short', 'UrlMapperController@store');
    Route::post('/login', 'ApiV3Controller@login_api');
    Route::post('/register', 'ApiV3Controller@register_api');
    Route::post('/logout', 'ApiV3Controller@logout');
    Route::group(['middleware' => ['jwt.auth']], function (){
        Route::get('/get-cau-hoi1', 'ApiV3Controller@getQuestion');
    });
});
