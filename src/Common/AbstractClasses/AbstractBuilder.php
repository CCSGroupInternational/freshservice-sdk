<?php declare(strict_types=1);

namespace Freshservice\Common\AbstractClasses;

use Freshservice\Common\Traits\OperatorTrait;

abstract class AbstractBuilder
{
    use OperatorTrait;

    protected $client;
    protected $api;
    protected $model;

    public function __construct(
        \Freshservice\Common\Resources\Connection $client,
        AbstractApi $api,
        string $model)
    {
        $this->client = $client;
        $this->api = $api;
        $this->model = $model;
    }

    public function create(array $options): AbstractModel
    {
        $response = $this->execute($this->api->create(), $options);
        return $this->model($this->model)->populateFromArray($response[array_keys($response)[0]]);
    }

//    public function get(string $id): \Vsd\Common\AbstractClasses\AbstractModel
//    {
//        return $this->model($this->model)->populateFromArray($this->execute($this->api->get(), ['ID' => $id])[0]);
//    }
//
//    public function list(array $options = null): \Vsd\Common\Resources\VsdIterator
//    {
//        return $this->model($this->model)->enumerate($this->api->all(), $options);
//    }
//
//    public function delete(string $id): \Vsd\Common\AbstractClasses\AbstractModel
//    {
//        return $this->model($this->model, ['ID' => $id])->delete();
//    }
//
//    public function update(array $options): \Vsd\Common\AbstractClasses\AbstractModel
//    {
//        return $this->model($this->model, $options)->update();
//    }
//
//    public function listByParent(array $options): \Vsd\Common\Resources\VsdIterator
//    {
//        return $this->model($this->model)->enumerate($this->api->ByParents(), $options);
//    }
//
    protected function model(string $class, array $data = null)
    {
        $model = new $class($this->client);
        if (isSet($data)) {
            $model->populateFromArray($data);
        }
        return $model;
    }
}