<?php

namespace App\Helper\Transform;

class Objects
{
    public static function toArray($object): array
    {
        // 2x faster way & it will work on array of objects
        $array = [];
        foreach ($object as $key => $value) {
            if (is_array($value) or is_object($value)) {
                $value = self::toArray($value);
            }
            $array[$key] = $value;
        }
        return $array;

        // Twice slower
        // return json_decode(json_encode($object), true);
    }

}
