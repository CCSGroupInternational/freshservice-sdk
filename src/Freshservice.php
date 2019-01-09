<?php declare(strict_types=1);

namespace Freshservice;

use Freshservice\Common\Resources\Connection;
use Freshservice\Builders\Ticket;

class Freshservice {

    public $client;

    public function __construct(array $options = [])
    {
        $this->client = new Connection($options);
    }

    public function tickets(): Ticket
    {
        return new Ticket($this->client);
    }

}