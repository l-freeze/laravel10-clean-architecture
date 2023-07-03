<?php
declare(strict_types=1);
namespace Domain\System\Log\Application\UseCase\Get;

readonly final class Input{
    public function __construct(public string $traceId){
    }
}
