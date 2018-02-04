<?php

Route::group([
    'namespace'  => 'Booking',
    'except' => ['show']
], function () {

    /*
     * Admin Booking Controller
     */
    Route::resource('booking', 'AdminBookingController');

    Route::get('/', 'AdminBookingController@index')->name('booking.index');
    Route::get('/get', 'AdminBookingController@getTableData')->name('booking.get-list-data');
});
