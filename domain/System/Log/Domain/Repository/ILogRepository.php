<?php
declare(strict_types=1);
namespace Domain\System\Log\Domain\Repository;

use Domain\System\Log\Domain\Entity\Stack;
use Domain\System\Log\Domain\Value\GeneralLog;

interface ILogRepository{
    public function add(GeneralLog $generalLog): void;
    public function get(string $traceId): ?Stack;
}