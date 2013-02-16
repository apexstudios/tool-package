<?php

class Cli
{
    const PREFIX = ':';

    const TEXT_NOTICE = 'Notice';
    const TEXT_FATAL = 'Fatal';
    const TEXT_SUCCESS = 'Success';
    const TEXT_ERROR = 'Error';

    public static function notice($text)
    {
        static::prefixOutput(self::TEXT_NOTICE, $text);
    }

    public static function success($text)
    {
        static::prefixOutput(self::TEXT_SUCCESS, $text);
    }

    public static function error($text)
    {
        static::prefixOutput(self::TEXT_ERROR, $text);
    }

    public static function fatal($text)
    {
        static::prefixOutput(self::TEXT_FATAL, $text . "\nExiting.");
        die();
    }

    public static function prefixOutput($prefix, $text)
    {
        $prefix = " " . str_pad($prefix, 8);

        static::output($prefix . "" . self::PREFIX . "\t" . $text);
    }

    public static function output($text)
    {
        /*$array = preg_split("//", $text);

        foreach ($array as $char) {
            print $char;
            usleep(10);
        }*
         */
        usleep(100);
        print $text;
        print PHP_EOL;
    }
}
