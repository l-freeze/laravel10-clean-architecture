<?php
declare(strict_types=1);

namespace Domain\Account\Domain\Repository;

use Domain\Account\Domain\Entity\Account;
interface IAccountRepository{

    public function getByEmail(string $email): ?Account;
    public function save(account $email): Account;
}