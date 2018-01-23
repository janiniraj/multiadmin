<?php
Route::group([
    'prefix'     => 'quotesetting',
    'as'         => 'quotesetting.',
    'namespace'  => 'QuoteSetting',
], function () {
    Route::get('quotesetting/singleitem', 'SingleItem@index')->name('singleitem.get');
});