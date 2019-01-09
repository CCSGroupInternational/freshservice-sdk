<?php declare(strict_types=1);

namespace Freshservice\Common\AbstractClasses;

use Freshservice\Common\Resources\FreshserviceIterator;
use Freshservice\Common\Resources\Params;
use Freshservice\Common\Traits\OperatorTrait;
use Freshservice\Common\Resources\ParentRelationship;

abstract class AbstractModel
{
    use OperatorTrait;

    protected $client;
    protected $api;

    public function __construct(\Freshservice\Common\Resources\Connection $client,
                                AbstractApi $api)
    {
        $this->client = $client;
        $this->api = $api;
    }

    public function __call($name, $arguments = null)
    {
        if (in_array($name, array_keys($this->relations))) {
            return new ParentRelationship($this->relations[$name], $this->resourceKey, $this->ID, $this->client);
        }
        throw new \Exception('Relation not Valid', 1);
    }

    public function update(): self
    {
        $this->execute($this->api->update(), get_object_vars($this));
        return $this;
    }

    public function delete(): self
    {
        $this->execute($this->api->delete(), ['ID' => $this->ID]);
        return $this;
    }

    public function enumerate($api, array $options = null): FreshserviceIterator
    {
        return new FreshserviceIterator(
            $this,
            $this->execute($api, $options)
        );
    }

    public function populateFromArray(array $data): self
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
        return $this;
    }

}