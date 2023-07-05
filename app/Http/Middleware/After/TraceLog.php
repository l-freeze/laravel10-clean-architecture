<?php

namespace App\Http\Middleware\After;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Domain\Common\Singleton\TraceId;
use Domain\System\Log\Domain\Repository\ILogRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class TraceLog
{
    public function __construct(readonly private ILogRepository $logRepository){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $respons = $next($request);
        $log = $this->logRepository->get(TraceId::getInstance()->value);
        Log::info('TraceLog', [$log->toJson()]);

        /*
        $request = Request::create(
            uri: '/system/log',
            method: "GET",
            parameters: [
                'trace_id' => TraceId::getInstance()->value
            ],
            server: [
                'CONTENT_TYPE' => 'application/json'
            ],
        );
        $res = App::handle($request);
        */

        return $respons;
    }
}
