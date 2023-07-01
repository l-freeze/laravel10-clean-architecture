<?php
declare(strict_types=1);
namespace Domain\Account;

use Domain\Account\Application\UseCase\Register\Query\IAccountQuery;
use Domain\Account\Infrastructure\Repository\AccountRepository;
use Domain\Account\Infrastructure\Query\Register\AccountQuery;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Domain\Account\Domain\Repository\IAccountRepository;

final class ServiceProvider extends BaseServiceProvider implements DeferrableProvider{
    /**
     * @phpstan-ignore-next-line
     */
    public $bindings = [
        IAccountQuery::class => AccountQuery::class,
        IAccountRepository::class => AccountRepository::class
    ];

    //public function register(): void{
    //    $this->app->bind(IAccountQuery::class ,AccountQuery::class);
    //}
    public function provides(): array{
        return [
            IAccountQuery::class,
            IAccountRepository::class
        ];
    }

}
