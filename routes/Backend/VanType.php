<?php

Route::group([
    'namespace'  => 'VanType',
], function () {

    /*
     * Admin Event Controller
     */
    Route::resource('van-type', 'AdminVanTypeController');

    Route::get('/', 'AdminVanTypeController@index')->name('van-type.index');
    Route::get('/get', 'AdminVanTypeController@getTableData')->name('van-type.get-list-data');
    Route::get('/{id}/delete', 'AdminVanTypeController@destroy')->name('van-type.delete');
});
