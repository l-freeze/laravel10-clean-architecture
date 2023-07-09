<?php
declare(strict_types=1);
namespace Domain\System\Log\Domain\Entity;

use Domain\System\Log\Domain\Value\GeneralLog;
use Illuminate\Contracts\Support\Jsonable;

final class Stack implements Jsonable{
    /**
     * @param array<GeneralLog> $logs
     */
    public function __construct(private array $logs = []){
    }

    public function add(GeneralLog $generalLog): void
    {
        $this->logs[] = $generalLog;
    }

    /**
     * @return array<GeneralLog>
     */
    public function get(string $traceId): array
    {
        return $this->logs;
    }

    /**
     * ログ出力用に綺麗にフォーマットしてjson可する
     */
    public function toJson($options = 0): string
    {
        $formattedLog = $this->logs;

        //formatする
        return json_encode($formattedLog);
    }

}
