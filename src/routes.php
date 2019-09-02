<?php

Route::group([
    'middleware' => ['web', 'laracms.auth', 'laracms.language'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Newsletter\Controllers',
    'prefix'     => 'laracms/newsletter/'
], function () {
    Route::get('/', 'NewsletterController@index')->name('laracms.newsletter');
    Route::post('/', 'NewsletterController@send');
});