<?php

use Illuminate\Support\Facades\Route;

Route::prefix('account')->group(function(){
    Route::get('/', fn()=>'account root');
    Route::get('/register', Domain\Account\Presentation\Register\Controller::class);
});
