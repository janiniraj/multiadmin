<?php
Route::group([
'namespace'  => 'Booking',
'except' => ['show']
], function () {


Route::resource('booking_new', 'BookingController');

Route::get('/', 'BookingController@index')->name('booking_new.index');
Route::get('/get', 'BookingController@getTableData')->name('booking_new.get-list-data');
Route::get('/get-address/{postCode?}', 'BookingController@getAddress')->name('booking_new.get-address');
});