<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show;

final class Input{
    public function __construct(
        readonly public string $email,
    ){
    }
}