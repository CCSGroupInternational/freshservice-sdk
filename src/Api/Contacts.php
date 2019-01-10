<?php declare(strict_types=1);

namespace Freshservice\Api;

use Freshservice\Common\AbstractClasses\AbstractApi;
use Freshservice\Common\Resources\Connection;

class Contacts extends AbstractApi
{

    public function create(): array
    {
        return [
            'method'      => 'POST',
            'path'        => 'itil/requesters.json',
            'resourceKey' =>  'user',
            'statusCode'  => Connection::$expectedResponse['GET'],
            'params'      => [
                'name'     => $this->params->stringJson(),
                'email'    => $this->params->stringJson(),
                'address'  => $this->params->stringJson(),
                'phone'    => $this->params->integerJson(),
            ]
        ];
    }

}