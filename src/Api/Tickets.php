<?php declare(strict_types=1);

namespace Freshservice\Api;

use Freshservice\Common\AbstractClasses\AbstractApi;

class Tickets extends AbstractApi
{

//    public function all(): array
//    {
//        return [
//            'method'  => 'GET',
//            'path'    => 'enterprises',
//            'params'  => [
//                'name'  => $this->params->stringFilter(),
//            ]
//        ];
//    }
//
//    public function get(): array
//    {
//        return [
//            'method'  => 'GET',
//            'path'    => 'enterprises/{ID}',
//            'params'  => [
//                'ID' => $this->params->stringPath()
//            ]
//        ];
//    }

    public function create(): array
    {
        return [
            'method'  => 'POST',
            'path'    => 'api/v2/tickets',
            'params'  => [
                'description'  => $this->params->stringJson(),
                'subject'      => $this->params->stringJson(),
                'email'        => $this->params->stringJson(),
                'priority'     => $this->params->integerJson(),
                'status'       => $this->params->integerJson(),
            ]
        ];
    }

//    public function delete(): array
//    {
//        return [
//            'method'  => 'DELETE',
//            'path'    => 'enterprises/{ID}',
//            'params'  => [
//                'ID' => $this->params->stringPath(),
//            ],
//            'responseChoice' => 1
//        ];
//    }
//
//    public function update(): array
//    {
//        return [
//            'method'  => 'PUT',
//            'path'    => 'enterprises/{ID}',
//            'params'  => [
//                'ID'   => $this->params->stringPath(),
//                'name' => $this->params->stringJson(),
//                'description' => $this->params->stringJson(),
//                'enterpriseProfileID' => $this->params->stringJson()
//            ],
//            'responseChoice' => 1
//        ];
//    }


}