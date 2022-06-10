<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/v2'
], function() {
    Route::post('getMessages', 'ChatRoomControllerV2@getMessages');
    Route::get('get-list-speciality', 'ChatRoomControllerV2@getListSpeciality');
    Route::get('get-doctor-speciality-by-id/{id}', 'ChatRoomControllerV2@getDoctorSpecialityById');
    Route::post('send-message', 'ChatRoomControllerV2@sendMessage');
    Route::post('send-message-to-new-patient', 'ChatRoomControllerV2@sendMessageToNewPatient');
    Route::post('test', 'ChatRoomControllerV2@test');
    Route::post('get-token', 'ChatRoomController@getToken');
});