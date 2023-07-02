<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Query\Show;

use Domain\Account\Application\UseCase\Show\Exception\AccountNotFoundException;
use Domain\Account\Application\UseCase\Show\Query\IAccountQuery;
use Domain\Account\Application\UseCase\Show\Value\Account;
use App\Models;

final class AccountQuery implements IAccountQuery{

    public function getByEmail(string $email): ?Account
    {
        $result = Models\Account::query()->where('email', '=', $email)->first();
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