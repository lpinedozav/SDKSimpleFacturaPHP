<?php

namespace SDKSimpleFactura\Utils;

use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

class Serializer
{
    /**
     * Convierte un objeto a un array asociativo.
     * Admite objetos que implementen JsonSerializable o clases con propiedades públicas.
     *
     * @param mixed $obj
     * @return mixed
     */
    public static function objectToArray($obj)
    {
        if ($obj === null) {
            return null;
        }

        // Si el objeto implementa JsonSerializable, usamos jsonSerialize
        if ($obj instanceof JsonSerializable) {
            return $obj->jsonSerialize();
        }

        // Si el objeto es un enum
        if (method_exists($obj, 'value')) {
            return $obj->value();
        }

        // Si el objeto es una lista
        if (is_array($obj)) {
            return array_map([self::class, 'objectToArray'], $obj);
        }

        // Si es un objeto genérico
        if (is_object($obj)) {
            $result = [];
            $reflection = new ReflectionClass($obj);
            foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
                $name = $property->getName();
                $value = $property->getValue($obj);
                if ($value !== null) { // Omitir valores null
                    $result[$name] = self::objectToArray($value);
                }
            }
            return $result;
        }

        // Caso genérico (valores primitivos)
        return $obj;
    }

    /**
     * Serializa un objeto en formato JSON.
     *
     * @param mixed $solicitud
     * @return string
     */
    public static function serializeToJson($solicitud): string
    {
        $array = self::objectToArray($solicitud);
        return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Serializa un objeto en formato array.
     *
     * @param mixed $solicitud
     * @return array
     */
    public static function serializeToArray($solicitud): array
    {
        return self::objectToArray($solicitud);
    }
}
