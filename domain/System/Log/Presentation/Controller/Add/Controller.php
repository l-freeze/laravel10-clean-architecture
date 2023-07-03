<?php
declare(strict_types=1);
namespace Domain\System\Log\Presentation\Add;

use App\Http\Controllers\Controller as BaseController;
use DateTimeImmutable;
use Domain\System\Log\Application\UseCase\Add\Input;
use Domain\System\Log\Application\UseCase\Add\Interactor;
use Domain\System\Log\Application\UseCase\Add\Output;
use Domain\System\Log\Presentation\Add\Request;

final class Controller extends BaseController{
    public function __invoke(Request $request, Interactor $interactor): void
    {
        $input = new Input(
            traceId: $request->validated('trace_id'),
            spanId: $request->validated('span_id'),
            requestTime: DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sp', $request->validated('request_time')),
            tags: $request->validated('tags'),
            log: $request->validated('log')
        );
        $interactor->execute($input);
    }
}