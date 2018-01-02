<?php

Route::group([
    'namespace'  => 'Page',
], function () {

    /*
     * Admin Event Controller
     */
    Route::resource('page', 'AdminPageController');

    Route::get('/', 'AdminPageController@index')->name('page.index');
    Route::get('/get', 'AdminPageController@getTableData')->name('page.get-list-data');
});
