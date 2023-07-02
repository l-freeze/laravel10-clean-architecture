<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show;

readonly final class Output{    
    public function __construct(
        public int $id,
        public string $email,
        public ?string $name
    ){
    }
}