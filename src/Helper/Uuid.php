<?php
/** Uuid Helper class */
namespace Omnipay\PaywayRest\Helper;

/**
*
*/
abstract class Uuid
{

    /**
     * Create UUID v4 string
     *
     * Inspiration from GUI: the guid generator
     * @see http://guid.us/GUID/PHP
     *
     * @return string UUID v4 as string
     */
    public static function create()
    {
        // use COM helper if available
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        }

        // generate UUID
        mt_srand((double) microtime() * 10000); // optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $uuid = join('-', array(
            substr($charid, 0, 8),
            substr($charid, 8, 4),
            substr($charid, 12, 4),
            substr($charid, 16, 4),
            substr($charid, 20, 12),
        ));

        return $uuid;
    }

    /**
     * Create a UUID v4 string enclosed by braces
     * @return string UUID v4 string with braces
     */
    public static function createEnclosed()
    {
        return '{' . self::create() . '}';
    }
}
