<?php declare(strict_types=1);

namespace Freshservice\Builders;

use Freshservice\Common\AbstractClasses\AbstractBuilder;
use Freshservice\Api\Contacts;
use Freshservice\Models\Contact as ContactModel;

class Contact extends AbstractBuilder
{
    public function __construct($client)
    {
        parent::__construct($client,new Contacts(),ContactModel::class);
    }
}