<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show\Value;

readonly final class Account {
    public function __construct(
        public int $id,
        public string $email,
        public ?string $name,
    ){
    }
}