<?php
declare(strict_types=1);
namespace Domain\Common\Singleton;

final class TraceId{
    private const HASH_ALGO = 'ripemd160';
    private static TraceId $instance;

    private function __construct(public string $value){        
    }

    static public function getInstance(): self
    {
        if (!isset(static::$instance)) {
            $traceId = hash(
                algo: self::HASH_ALGO,
                data: (string) getmypid() . (string)time()
            );
            static::$instance = new TraceId($traceId);          
        }
        return static::$instance;
    }
}