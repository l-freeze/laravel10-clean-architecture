<?php
declare(strict_types=1);
namespace Domain\System\Log\Infrastructure\Repository;

use Domain\System\Log\Domain\Entity\Stack;
use Domain\System\Log\Domain\Repository\ILogRepository;
use Domain\System\Log\Domain\Value\GeneralLog;

final class LogRepository implements ILogRepository{
    private Stack $stack;

    public function __construct(){
        $this->stack = new Stack();
        
    }

    public function save(GeneralLog $generalLog): void
    {
        $this->stack->add($generalLog);
    }
    public function get(string $traceId): ?Stack
    {
        return $this->stack;
    }
}