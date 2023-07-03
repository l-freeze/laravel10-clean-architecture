<?php
declare(strict_types=1);
namespace Domain\System\Log\Application\UseCase\Get;

use Domain\System\Log\Domain\Repository\ILogRepository;

readonly final class Interactor{
    public function __construct(readonly private ILogRepository $logRepository){
    }

    public function execute(Input $input): Output
    {
        $stack = $this->logRepository->get($input->traceId);
        return new Output($stack);

    }
}
