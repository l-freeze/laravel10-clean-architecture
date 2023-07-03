<?php
declare(strict_types=1);
namespace Domain\System\Log;

use Domain\System\Log\Domain\Repository\ILogRepository;
use Domain\System\Log\Infrastructure\LogRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class ServiceProvider extends BaseServiceProvider implements DeferrableProvider{
    
    /**
     * @phpstan-ignore-next-line
     */
    public array $singletons = [
        ILogRepository::class => LogRepository::class
    ];

    public function provides(): array
    {
        return [
            ILogRepository::class
        ];
    }
}