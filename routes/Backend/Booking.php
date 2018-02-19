<?php

Route::group([
    'namespace'  => 'Booking',
    'except' => ['show']
], function () {


    Route::resource('booking', 'AdminBookingController');

    Route::get('/', 'AdminBookingController@index')->name('booking.index');
    Route::get('/get', 'AdminBookingController@getTableData')->name('booking.get-list-data');
});


