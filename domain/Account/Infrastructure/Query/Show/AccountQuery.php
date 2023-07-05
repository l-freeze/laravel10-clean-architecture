<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Query\Show;

use Domain\Account\Application\UseCase\Show\Exception\AccountNotFoundException;
use Domain\Account\Application\UseCase\Show\Query\IAccountQuery;
use Domain\Account\Application\UseCase\Show\Value\Account;
use App\Models;
use Domain\Account\Application\UseCase\Show\Command\ILogCommand;

final class AccountQuery implements IAccountQuery{
    
    public function __construct(readonly private ILogCommand $logCommand) {

    }

    public function getByEmail(string $email): ?Account
    {
        $builder = Models\Account::query()->where('email', '=', $email);

        $this->logCommand->add(
            spanId: __FUNCTION__,
            log: [
                'Command' => [
                    'sql' => $builder->toSql(),
                    'bindings' => $builder->getBindings(),    
                ]
            ]
        );

        $result = $builder->first();
        $this->logCommand->add(
            spanId: __FUNCTION__,
            log: [
                'Command' => [
                    'result' => $result?->toArray(),
                ]
            ]
        );

        if(is_null($result)){
            throw new AccountNotFoundException();
        }
        return new Account(
            id: $result->id,
            email: $result->email,
            name: $result->name
        );
    }
}