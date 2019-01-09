<?php declare(strict_types=1);

namespace Freshservice\Models;

use Freshservice\Common\AbstractClasses\AbstractModel;
use Freshservice\Api\Tickets;


class Ticket extends AbstractModel
{
    public $ID;
    public $description;
    public $subject;
    public $email;
    public $priority;
    public $status;
    protected $resourceKey = 'tickets';

    public function __construct(\Freshservice\Common\Resources\Connection $client)
    {
        parent::__construct($client, new Tickets());
    }
}