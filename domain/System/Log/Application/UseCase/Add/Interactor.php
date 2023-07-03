<?php
declare(strict_types=1);
namespace Domain\System\Log\Application\UseCase\Add;

use Domain\System\Log\Domain\Repository\ILogRepository;
use Domain\System\Log\Domain\Value\GeneralLog;

readonly final class Interactor{
    public function __construct(readonly private ILogRepository $logRepository){
    }

    public function execute(Input $input): void
    {
        $log = new GeneralLog(
            traceId: $input->traceId,
            spanId: $input->spanId,
            requestTime: $input->requestTime,
            tags: $input->tags,
            log: $input->log
        );
        $this->logRepository->save($log);
    }
}
