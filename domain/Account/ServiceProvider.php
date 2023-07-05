<?php
declare(strict_types=1);
namespace Domain\Account;

use Domain\Account\Application\UseCase\Show\Command\ILogCommand;
use Domain\Account\Application\UseCase\Show\Query\IAccountQuery;
use Domain\Account\Infrastructure\Query\Show\AccountQuery;
use Domain\Account\Infrastructure\Repository\AccountRepository;
use Domain\Account\Domain\Repository\IAccountRepository;
use Domain\Account\Infrastructure\Command\Show\LogCommand;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class ServiceProvider extends BaseServiceProvider implements DeferrableProvider{
    /**
     * @phpstan-ignore-next-line
     */
    public $bindings = [
        IAccountQuery::class => AccountQuery::class,
        IAccountRepository::class => AccountRepository::class,
        ILogCommand::class => LogCommand::class
    ];

    //public function register(): void{
    //    $this->app->bind(IAccountQuery::class ,AccountQuery::class);
    //}
    public function provides(): array{
        return [
            IAccountQuery::class,
            IAccountRepository::class,
            ILogCommand::class
        ];
    }

}
