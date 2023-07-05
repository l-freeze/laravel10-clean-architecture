<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Command\Register;

use DateTimeImmutable;
use Domain\Account\Application\UseCase\Show\Command\ILogCommand;
use Domain\Common\Singleton\TraceId;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

final class LogCommand implements ILogCommand{

    private DateTimeImmutable $requestTime;
    private string $traceId;

    /**
     * @var array<string, string>
     */
    private array $tags = [];

    public function __construct() {
        $this->setRequestTime(new DateTimeImmutable());
        $this->setTraceId(TraceId::getInstance()->value);
    }
    
    private function setRequestTime(DateTimeImmutable $datetime): void
    {
        $this->requestTime = $datetime;
    }

    private function setTraceId(string $id): void
    {
        $this->traceId = $id;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function add(string $spanId, array $log, array $optionalTags = []): void
    {
        $content = [
            'trace_id' => $this->traceId,
            'span_id' => $spanId,
            'request_time' => $this->requestTime->format('Y-m-d\TH:i:sp'),
            'tags' => [...$this->tags, ...$optionalTags],
            'log' => $log
        ];

        $request = Request::create(
            uri: '/system/log',
            method: "POST",
            parameters: $content,
            //cookies: [],
            //files: [],
            server: [
                'CONTENT_TYPE' => 'application/json'
            ],
            content: json_encode($content)
        );
        $res = App::handle($request);
        //$res = Route::dispatch($request);
        $debug = $res;

    }
}