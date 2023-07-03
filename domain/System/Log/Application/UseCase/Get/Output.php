<?php
declare(strict_types=1);
namespace Domain\System\Log\Application\UseCase\Get;

use Domain\System\Log\Domain\Entity\Stack;

readonly final class Output{
    public function __construct(
        public ?Stack $stack
    ){
    }
}
