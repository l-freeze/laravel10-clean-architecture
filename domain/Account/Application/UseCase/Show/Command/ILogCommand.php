<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show\Command;

interface ILogCommand{

    /**
     * @param array<string, string> $tags
     */
    public function setTags(array $tags): void;

    /**
     * @param array<string> $tags
     */
    public function add(
        string $spanId,
        array $log,
        array $optionalTags = [],
    ): void;
}