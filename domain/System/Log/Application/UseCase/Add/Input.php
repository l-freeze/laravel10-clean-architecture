<?php
declare(strict_types=1);
namespace Domain\System\Log\Application\UseCase\Add;

use DateTimeImmutable;

readonly final class Input{
    /**
     * @param array<string> $tags
     */
    public function __construct(
        public string $traceId,
        public string $spanId,
        public DateTimeImmutable $requestTime,
        public array $tags,
        public array $log
    ){
    }
}
