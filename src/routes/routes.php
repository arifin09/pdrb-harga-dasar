<?php

Route::group(['prefix' => 'pdrb-harga-dasar'], function() {
    Route::get('demo', 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@demo');
});
