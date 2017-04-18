<?php

namespace Omniship\Common;

class Util
{
    /**
     *
     *
     * @param  mixed  $object
     * @param  array  $parameters
     * @return void
     */
    public static function initialize($object, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($object, $method)) {
                $object->{$method}($value);
            }
        }
    }

    /**
     * Returns the Fully-Qualified Class Name.
     *
     * @param  string  $name
     * @return string
     */
    public static function getCarrierFQCN($name)
    {
        if (strpos($name, '\\') === 0) {
            return $name;
        }

        return "\\Omniship\\{$name}\\Carrier";
    }
}
