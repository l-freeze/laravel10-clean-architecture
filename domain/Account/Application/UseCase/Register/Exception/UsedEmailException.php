<?php
declare(strict_types=1);

namespace Domain\Account\Application\UseCase\Register\Exception;

use DomainException;
final class UsedEmailException extends DomainException{

    private const SYSTEM_CODE_PREFIX = 'AC_REG_';
    private const REASON = '登録済みメールアドレス';
    readonly private string $systemCode;
    public function __construct(){

        $this->systemCode = self::SYSTEM_CODE_PREFIX . str_replace(__NAMESPACE__.'\\', '', __CLASS__);

        parent::__construct(
            message: $this->systemCode,
            code: 422,
            previous: null
        );
    }

    public function __toString(): string
    {
        return'['. $this->systemCode. '] '. self::REASON;
    }

}