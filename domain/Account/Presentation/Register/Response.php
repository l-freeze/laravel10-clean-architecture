<?php

namespace Domain\Account\Presentation\Register;

use Domain\Account\Application\UseCase\Register\Output;
use Illuminate\Http\Response as BaseResponse;

class Response extends BaseResponse
{
    public function __construct(Output $output){
        parent::__construct();
        $content = 'aaaaaaaaaaaaaaaa';

        $this->setContent($content);
    }
}
