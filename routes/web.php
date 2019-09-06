<?php

use Illuminate\Support\Facades\Route;

Route::post('subscribe', 'NewsletterController@subscribe')->name('subscribe');
