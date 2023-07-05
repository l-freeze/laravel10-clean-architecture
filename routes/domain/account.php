<?php

use Illuminate\Support\Facades\Route;

Route::prefix('account')->group(function(){
//    Route::get('/register', fn() => Domain\Account\Presentation\Register\Controller::class);
    Route::get('/register', Domain\Account\Presentation\Controller\Register\Controller::class);
    Route::get('/show', Domain\Account\Presentation\Controller\Show\Controller::class);
});
