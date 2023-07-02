<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show\Query;

use Domain\Account\Application\UseCase\Show\Value\Account;
interface IAccountQuery{

    public function getByEmail(string $email): ?Account;
}