<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class DebugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        parent::boot();
        
        if( app()->environment('local', 'test', 'development', 'staging')){
            Event::listen('Illuminate\Database\Events\TransactionBeginning', function () {
                Log::debug('beginTransaction');
            });

            DB::listen(function ($query) {
                Log::debug($query->sql);
                Log::debug($query->bindings);
            });

            Event::listen('Illuminate\Database\Events\TransactionCommitted', function () {
                Log::debug('commit');
            });

            Event::listen('Illuminate\Database\Events\TransactionRolledBack', function () {
                Log::debug('rollBack');
            });
        }

    }
}
