<?php

namespace Omniship;

use Omniship\Common\Manager;
use Omniship\Common\ManagerInterface;

class Omniship
{
    /**
     * The manager instance.
     *
     * @var \Omniship\Common\ManagerInterface
     */
    protected static $manager;

    /**
     * Returns the manager instance.
     *
     * @return \Omniship\Common\ManagerInterface
     */
    public static function getManager()
    {
        if (! static::$manager) {
            static::$manager = new Manager;
        }

        return static::$manager;
    }

    /**
     * Sets the manager instance.
     *
     * @param  \Omniship\Common\ManagerInterface  $manager
     * @return void
     */
    public static function setManager(ManagerInterface $manager)
    {
        static::$manager = $manager;
    }

    /**
     * Dynamically handle missing methods.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return \Omniship\Common\ManagerInterface
     */
    public function __call($method, array $parameters)
    {
        return $this->__callStatic($method, $parameters);
    }

    /**
     * Static function call router.
     *
     * @param  string  $method
     * @param  mixed  $parameters
     * @return \Omniship\Common\ManagerInterface
     */
    public static function __callStatic($method, array $parameters)
    {
        $manager = static::getManager();

        return call_user_func_array([ $manager, $method ], $parameters);
    }
}
