<?php declare(strict_types=1);

namespace Freshservice;

use Freshservice\Common\Resources\Connection;

class Freshservice {

    public $client;

    public function __construct(array $options = [])
    {
        $this->client = new Connection($options);
    }

}