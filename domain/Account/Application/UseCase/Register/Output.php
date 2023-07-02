<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Register;

readonly final class Output{    
    public function __construct(
        public string $email,
        public bool $result
    ){
    }
}