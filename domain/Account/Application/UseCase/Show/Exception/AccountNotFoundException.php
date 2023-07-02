<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Show\Exception;

use DomainException;
final class AccountNotFoundException extends DomainException{

    private const SYSTEM_CODE_PREFIX = 'AC_SHO_';
    private const REASON = 'アカウントが見つからない';
    readonly private string $systemCode;
    public function __construct(){

        $this->systemCode = self::SYSTEM_CODE_PREFIX . str_replace(__NAMESPACE__.'\\', '', __CLASS__);

        parent::__construct(
            message: $this->systemCode,
            code: 404,
            previous: null
        );
    }

    public function __toString(): string
    {
        return'['. $this->systemCode. '] '. self::REASON;
    }

}