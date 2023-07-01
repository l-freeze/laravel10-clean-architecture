<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Register\Query;

use Domain\Account\Domain\Entity\Account;
interface IAccountQuery{

    public function getByEmail(string $email): ?Account;
}