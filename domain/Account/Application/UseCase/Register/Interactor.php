<?php
declare(strict_types=1);
namespace Domain\Account\Application\UseCase\Register;

use Domain\Account\Application\UseCase\Register\Query\IAccountQuery;
use Domain\Account\Domain\Entity\Account;
use Domain\Account\Domain\Repository\IAccountRepository;
use Domain\Account\Application\UseCase\Register\Exception\UsedEmailException;
final class Interactor{
    public function __construct(
        private IAccountQuery $accountQuery, 
        private IAccountRepository $accountRepository
    ){

    }

    public function execute(Input $input): Output{

        $sameMailAccount = $this->accountQuery->getByEmail($input->email);
        $account = Account::create(
            email: $input->email,
            rawPassword: $input->password,
            existsAccount: $sameMailAccount
        );
        if(!$account->isCreatable()) {
            throw new UsedEmailException();
        }
        $this->accountRepository->save($account);
        
        
        return new Output(
            email: $input->email,
            result: true
        );
    }

}