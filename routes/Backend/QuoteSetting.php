<?php
Route::group([
    'prefix'     => 'quotesetting',
    'as'         => 'quotesetting.',
    'namespace'  => 'QuoteSetting',
], function () {
    Route::get('singleitem', 'SingleItemController@index')->name('singleitem.get');
});