<?php
Route::group([
    'prefix'     => 'quotesetting',
    'as'         => 'quotesetting.',
    'namespace'  => 'QuoteSetting',
], function () {
    Route::get('singleitem', 'SingleItemController@index')->name('singleitem.get');
    Route::post('singleitem', 'SingleItemController@saveData')->name('singleitem.save-data');
});