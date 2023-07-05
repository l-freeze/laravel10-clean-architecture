<?php

namespace Domain\Account\Presentation\Controller\Show;

use Domain\Account\Application\UseCase\Show\Output;
use Illuminate\Http\JsonResponse;

class Response extends JsonResponse
{
    public function __construct(Output $output){
        parent::__construct();
        $this->setData([
            'id' => $output->id,
            'email' => $output->email,
            'name' => $output->name,
        ]);
    }
}
