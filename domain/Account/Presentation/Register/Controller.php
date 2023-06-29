<?php

namespace Domain\Account\Presentation\Register;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Domain\Account\Application\UseCase\Register\Input;
use Domain\Account\Application\UseCase\Register\Interactor;
use Domain\Account\Application\UseCase\Register\Output;

class Controller extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Interactor $interactor): Response
    {
        $input = new Input('name', 'pass');
        return new Response($interactor->execute());
    }
}
