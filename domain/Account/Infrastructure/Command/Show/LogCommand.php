<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Command\Show;

use DateTimeImmutable;
use Domain\Account\Application\UseCase\Show\Command\ILogCommand;
use Domain\Common\Singleton\TraceId;
use Domain\System\Log\Domain\Repository\ILogRepository;
use Domain\System\Log\Domain\Value\GeneralLog;
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

    public function __construct(readonly private ILogRepository $logRepository) {
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
        $log = new GeneralLog(
            traceId: $this->traceId,
            spanId: $spanId,
            requestTime: $this->requestTime,
            tags: [...$this->tags, ...$optionalTags],
            log: $log
        );
        $this->logRepository->add($log);

    }
}