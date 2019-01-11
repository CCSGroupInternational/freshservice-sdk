<?php declare(strict_types=1);

namespace Freshservice\Common\Resources;

class Params
{
    const URL = 'url';
    const STRING_TYPE = "string";
    const JSON = 'json';
    const INT_TYPE = 'integer';
    const ARRAY_TYPE = 'array';

    public function stringJson(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
        ];
    }

    public function integerJson(): array
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
        ];
    }

    public function integerPath(): array
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::URL,
        ];
    }

    public function requestedItemValues() {
        return [
            'type'        => self::ARRAY_TYPE,
            'location'    => self::JSON,
        ];
    }
}