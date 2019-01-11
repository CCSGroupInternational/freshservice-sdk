<?php declare(strict_types=1);

namespace Freshservice\Builders;

use Freshservice\Common\AbstractClasses\AbstractBuilder;
use Freshservice\Api\ServiceRequest as ServiceRequestApi;
use Freshservice\Models\ServiceRequest as ServiceRequestModel;

class ServiceRequest extends AbstractBuilder
{
    public function __construct($client)
    {
        parent::__construct($client,new ServiceRequestApi(),ServiceRequestModel::class);
    }
}