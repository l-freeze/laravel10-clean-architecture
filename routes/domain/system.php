<?php

use Illuminate\Support\Facades\Route;

Route::prefix('system/log')->group(function(){
    Route::get('/add', Domain\System\Log\Presentation\Register\Controller::class);
    Route::get('/get', Domain\Account\Presentation\Show\Controller::class);
});
