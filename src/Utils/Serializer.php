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
        // Si el objeto es una instancia de DateTime, convertir a formato de fecha
        if ($obj instanceof \DateTime) {
            return $obj->format('Y-m-d'); // Cambiar formato según lo requerido (e.g., 'Y-m-d H:i:s')
        }
        // Si el objeto implementa JsonSerializable, usamos jsonSerialize
        if ($obj instanceof JsonSerializable) {
            return $obj->jsonSerialize();
        }

        // Si el objeto es un enum
        if (is_object($obj) && enum_exists(get_class($obj))) {
            return $obj->value; // Retorna directamente el valor del enum
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
                $property->setAccessible(true); // Opcional, si hay propiedades privadas/protegidas
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
        $json = json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        if ($json === false) {
            throw new \RuntimeException('Error al serializar el objeto a JSON: ' . json_last_error_msg());
        }
        return $json;
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
