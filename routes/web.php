<?php

use Illuminate\Support\Facades\Route;

Route::get('unsubscribe?email={email}&list={?list}', 'NewsletterController@unsubscribe')->name('unsubscribe')->middleware('signed');
Route::post('subscribe', 'NewsletterController@subscribe')->name('subscribe');
