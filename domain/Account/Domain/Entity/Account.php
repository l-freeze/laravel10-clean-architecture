<?php
declare(strict_types=1);
namespace Domain\Account\Domain\Entity;

use DateTimeImmutable;

final class Account{

    private const TYPE_NEW_ENTRY = 1;//新規にアカウントを作るユーザー
    private const TYPE_EXISTS_ENTRY = 2;//既存ユーザー
    private bool $creatable = false;

    private function __construct(
        private ?int $id,
        readonly public string $email,
        readonly public ?string $password,
        readonly public ?DateTimeImmutable $created,
        private ?DateTimeImmutable $updated,
    ){    
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 新規アカウント発行
     */
    static public function create(string $email, string $rawPassword, ?Account $existsAccount): self|false
    {
        $now = new DateTimeImmutable('now');
        $newAccount = new self(
            id: null,
            email: $email,
            password: bcrypt($rawPassword),
            created: $now,
            updated: $now
        );
        $newAccount->isAlreadyExistsEmail($existsAccount);
        return $newAccount;
    }

    /**
     * 既存アカウントを元にエンティティ作成
     */
    static public function restore(
        string $email,
        DateTimeImmutable $created,
        DateTimeImmutable $updated,
    ): self
    {
        return new self(
            id: null,
            email: $email,
            password: null,
            created: $created,
            updated: $updated
        );
    }

    private function isAlreadyExistsEmail(?Account $account): void
    {
        if(is_null($account)){
            $this->creatable = true;
        }
    }

    public function isCreatable(): bool
    {
        return $this->creatable;
    }
}
