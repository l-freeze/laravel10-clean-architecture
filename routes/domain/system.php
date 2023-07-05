<?php

use Illuminate\Support\Facades\Route;

Route::prefix('system')->group(function(){
    Route::post('/log', Domain\System\Log\Presentation\Controller\Add\Controller::class);
    Route::get('/log', Domain\System\Log\Presentation\Controller\Get\Controller::class);
});
