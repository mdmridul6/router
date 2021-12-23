<?php

namespace App\Helper\Transform;
use stdClass;

class Arrays
{
    public static function toObject(array $array)
    {
        // Much faster way
        if (self::isAssociativeArray($array)) {
            $object = new stdClass();
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $value = self::toObject($value);
                }
                $object->{$key} = $value;
            }
            return $object;
        }
        return $array;
        // Alternate way (Slow)
        // return json_decode(json_encode($array), FALSE);
    }

    public static function isAssociativeArray(array $array): bool
    {
        if ([] === $array) {
            return false;
        }
        return array_keys($array) !== range(0, count($array) - 1);
    }

    public static function searchKey(string $searchKey, string $searchValue, array $array): int
    {
        return array_search($searchValue, array_column($array, $searchKey));
    }

    public static function search(string $searchKey, string $searchValue, array $array): array
    {
        return $array[self::searchKey($searchKey, $searchValue, $array)];
    }
}
