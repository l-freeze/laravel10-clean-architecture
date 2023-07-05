<?php

namespace Domain\Account\Presentation\Controller\Show;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Domain\Account\Application\UseCase\Show\Input;
use Domain\Account\Application\UseCase\Show\Interactor;
use Domain\Account\Application\UseCase\Show\Output;

class Controller extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Interactor $interactor): Response
    {
        $input = new Input($request->validated('email'));
        return new Response($interactor->execute($input));
    }
}
