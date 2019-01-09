<?php declare(strict_types=1);

namespace Freshservice\Builders;

use Freshservice\Common\AbstractClasses\AbstractBuilder;
use Freshservice\Api\Tickets;
use Freshservice\Models\Ticket as TicketModel;

class Ticket extends AbstractBuilder
{
    public function __construct($client)
    {
        parent::__construct($client,new Tickets(),TicketModel::class);
    }
}