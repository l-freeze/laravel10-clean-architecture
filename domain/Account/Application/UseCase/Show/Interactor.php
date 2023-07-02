<?php
declare(strict_types=1);
namespace Domain\Account\Application\UseCase\Show;

use Domain\Account\Application\UseCase\Show\Query\IAccountQuery;
use Domain\Account\Application\UseCase\Show\Exception\AccountNotFoundException;
final class Interactor{
    public function __construct(
        private IAccountQuery $accountQuery, 
    ){
    }

    public function execute(Input $input): Output{

        $account = $this->accountQuery->getByEmail($input->email);
        
        return new Output(
            id: $account->id,
            email: $account->email,
            name: $account->name
        );
    }

}