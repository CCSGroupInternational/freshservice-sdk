<?php declare(strict_types=1);

namespace Freshservice\Api;

use Freshservice\Common\AbstractClasses\AbstractApi;
use Freshservice\Common\Resources\Connection;

class ServiceRequest extends AbstractApi
{

    public function create(): array
    {
        return [
            'method'      => 'POST',
            'path'        => 'catalog/request_items/{item_display_id}/service_request.json',
            'statusCode'  => Connection::$expectedResponse['GET'],
            'params'      => [
                'item_display_id'      => $this->params->integerPath(),
                'requested_item_values' => $this->params->requestedItemValues(),
                'requested_for'   => $this->params->stringJson(),
                'requester_email' => $this->params->stringJson(),
            ]
        ];
    }

}