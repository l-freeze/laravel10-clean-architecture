<?php
declare(strict_types=1);
namespace Domain\System\Log\Domain\Value;

use DateTimeImmutable;

readonly final class GeneralLog{
    public function __construct(
        public string $traceId,
        public string $spanId,
        public DateTimeImmutable $requestTime,
        public array $tags,
        public array $log
    ){
    }
}
