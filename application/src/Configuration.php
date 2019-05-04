<?php
namespace Main;

use E4u\Configuration as E4uConfiguration;
use Zend\Config\Config;

abstract class Configuration extends E4uConfiguration
{
    /**
     * @return Config
     */
    public static function payuConfig()
    {
        return self::getConfigValue('payu');
    }

    /**
     * @return Config
     */
    public static function navConfig()
    {
        return self::getConfigValue('nav');
    }
}