<?php
declare(strict_types=1);
namespace Domain\System\Log\Presentation\Get;

use App\Http\Controllers\Controller as BaseController;
use DateTimeImmutable;
use Domain\System\Log\Application\UseCase\Get\Input;
use Domain\System\Log\Application\UseCase\Get\Interactor;
use Domain\System\Log\Application\UseCase\Get\Output;
use Domain\System\Log\Presentation\Add\Request;

final class Controller extends BaseController{
    public function __invoke(Request $request, Interactor $interactor): Output
    {
        $input = new Input(
            traceId: $request->validated('trace_id')
        );
        return $interactor->execute($input);
    }
}