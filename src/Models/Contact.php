<?php declare(strict_types=1);

namespace Freshservice\Models;

use Freshservice\Common\AbstractClasses\AbstractModel;
use Freshservice\Api\Contacts;


class Contact extends AbstractModel
{
    public $id;
    public $name;
    public $email;
    public $address;
    public $phone;

    protected $resourceKey = 'itil/requesters.json';

    public function __construct(\Freshservice\Common\Resources\Connection $client)
    {
        parent::__construct($client, new Contacts());
    }
}