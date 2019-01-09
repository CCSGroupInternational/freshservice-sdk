<?php declare(strict_types=1);

namespace Freshservice\Common\AbstractClasses;

use Freshservice\Common\Resources\Params;
use Freshservice\Common\Interfaces\ApiInterface;

abstract class AbstractApi implements ApiInterface
{
    protected $params;

    public function __construct()
    {
        $this->params = new Params();
    }

}