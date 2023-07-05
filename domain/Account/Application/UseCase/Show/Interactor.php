<?php
declare(strict_types=1);
namespace Domain\Account\Application\UseCase\Show;

use Domain\Account\Application\UseCase\Show\Command\ILogCommand;
use Domain\Account\Application\UseCase\Show\Query\IAccountQuery;
use Domain\Account\Application\UseCase\Show\Exception\AccountNotFoundException;
use Domain\Common\Singleton\TraceId;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

final class Interactor{
    public function __construct(
        private IAccountQuery $accountQuery, 
        private ILogCommand $logCommand, 
    ){
    }

    public function execute(Input $input): Output{

        $logTags = [
            'hostname' => env('HOSTNAME'),
            'request_url' => env('REQUEST_URI'),
            'user_agent' => env('HTTP_USER_AGENT'),
            'host' => env('HTTP_HOST'),
            'method' => env('REQUEST_METHOD'),
            'query_string' => env('QUERY_STRING')
        ];

        $this->logCommand->setTags($logTags);
        $this->logCommand->add(
            spanId: __FUNCTION__,
            log: [
                'Controller'=> [
                    '$input' => get_object_vars($input)
                ]
            ]
        );

        $account = $this->accountQuery->getByEmail($input->email);

        $this->logCommand->add(
            spanId: __FUNCTION__,
            log: [
                'Controller'=> [
                    '$account' => get_object_vars($account)
                ]
            ]
        );

        return new Output(
            id: $account->id,
            email: $account->email,
            name: $account->name
        );
    }

}