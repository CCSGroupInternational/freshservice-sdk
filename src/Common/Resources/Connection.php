<?php declare(strict_types=1);

namespace Freshservice\Common\Resources;

use GuzzleHttp\Client;

Class Connection
{
    public $connection;
    private $expectedResponse = [
        'GET'    => 200,
        'POST'   => 201,
        'PUT'    => 204,
        'DELETE' => 204,
    ];

    public function __construct(array $options = [])
    {
        $this->connection = new Client([
            'base_uri' => rtrim($options['baseUri'], '/') . '/',
            'headers' => [
                'Content-Type'         => 'application/json',
            ],
            'auth' => [$options['apiKey'], $options['password']],
            'verify' => isset($options['verify']) ? $options['verify'] : true,
        ]);
    }

    public function sendRequest(array $options, array $params = null)
    {
        $request = $this->requestBuilder($options,$params);
        $response = $this->connection->request(
            $request['method'],
            $request['path'],
            $request['Options']
        );
        $this->checkResponse($response,$request['method']);
        $data = json_decode((string) $response->getBody(),true);
        return $data;
    }

    private function requestBuilder(array $options, array $params = null)
    {
        $request['method'] = $options['method'];
        $request['path'] = $options['path'];
        if (isset($options['params'])) {
            foreach ($options['params'] as $param => $values) {
                if (isSet($params[$param])) {
                    if (gettype($params[$param] == $values['type'])) {
                        if ($values['location'] == Params::URL) { // Path Params
                            $request['path'] = str_replace('{'.$param.'}',$params[$param],$request['path']);
                        }
                        else if ($values['location'] == Params::JSON) { // Body Params To send in JSON Format
                            $request['Options']['body'][$param] = $params[$param];
                        }
                    }
                    else {
                        throw new Exception("Types No valid", 1); // Verify This
                    }
                }
            }
        }
        if (isSet($request['Options']['body'])) {
            $request['Options']['body'] = json_encode($request['Options']['body']);
        }

        return $request;
    }

    private function checkResponse($response, $method)
    {
        if ($this->expectedResponse[$method] != $response->getStatusCode()) {
            throw new \Exception('Unexpect Request Response. Status Code => '.$response->getReasonPhrase()." - Body => ".$response->getBody(), 1);
        }
    }
}