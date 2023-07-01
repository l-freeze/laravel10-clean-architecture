<?php

use Illuminate\Support\Facades\Route;

Route::prefix('account')->group(function(){
    Route::get('/phpinfo', fn()=>phpinfo());
//    Route::get('/register', fn() => Domain\Account\Presentation\Register\Controller::class);
    Route::get('/register', Domain\Account\Presentation\Register\Controller::class);
});
