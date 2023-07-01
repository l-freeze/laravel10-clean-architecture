<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Query\Register;

use Domain\Account\Application\UseCase\Register\Query\IAccountQuery;
use Domain\Account\Domain\Entity\Account;
use App\Models;

final class AccountQuery implements IAccountQuery{

    public function getByEmail(string $email): ?Account
    {
        $result = Models\Account::query()->where('email', '=', $email)->first();
        if(is_null($result)){
            return null;
        }
        return Account::restore(
            email: $result->email,
            created: $result->created,
            updated: $result->updated,            
        );
    }
}