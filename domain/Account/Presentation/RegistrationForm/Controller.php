<?php

namespace Domain\Account\Presentation\RegistrationForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return Response();

    }
}
