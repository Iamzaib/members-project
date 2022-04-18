<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Members
    Route::post('members/media', 'MembersApiController@storeMedia')->name('members.storeMedia');
    Route::apiResource('members', 'MembersApiController');
});
