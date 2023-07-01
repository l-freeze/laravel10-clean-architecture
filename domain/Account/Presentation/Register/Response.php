<?php

namespace Domain\Account\Presentation\Register;

use Domain\Account\Application\UseCase\Register\Output;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;

class Response extends JsonResponse
{
    public function __construct(Output $output){
        parent::__construct();
        $this->setData([
            'registerd email' => $output->email,
            'result' => $output->result
        ]);
    }
}
