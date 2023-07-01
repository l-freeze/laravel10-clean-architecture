<?php
declare(strict_types=1);

namespace Domain\Account\Infrastructure\Repository;

use Domain\Account\Domain\Repository\IAccountRepository;
use Domain\Account\Domain\Entity\Account;
use App\Models;

final class AccountRepository implements IAccountRepository{

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


    public function save(Account $account): Account
    {
        $model = Models\Account::create([
            'email' => $account->email,
            'password' => $account->password,
            'created' => $account->created,
            'updated' => $account->created,
        ]);//->refresh();
        $debug = $model->toArray();
        $account->setId($model->id);
        return $account;
    }
}