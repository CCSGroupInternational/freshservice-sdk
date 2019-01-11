<?php declare(strict_types=1);

namespace Freshservice\Models;

use Freshservice\Common\AbstractClasses\AbstractModel;
use Freshservice\Api\ServiceRequest as ServiceRequestApi;

class ServiceRequest extends AbstractModel
{
    public $id;
    public $item_display_id;
    public $requested_for;
    public $requester_email;

    protected $resourceKey = 'itil/requesters.json';

    public function __construct(\Freshservice\Common\Resources\Connection $client)
    {
        parent::__construct($client, new ServiceRequestApi());
    }
}