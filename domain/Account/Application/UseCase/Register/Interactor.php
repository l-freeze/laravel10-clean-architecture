<?php
declare(strict_types=1);
namespace Domain\Account\Application\UseCase\Register;

final class Interactor{
    public function __construct(){

    }

    public function execute(Input $input): Output{
        return new Output(
            email: $input->email,
            result: true
        );
    }

}