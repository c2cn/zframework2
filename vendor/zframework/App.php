<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 28/08/2015
 * Time: 16:02
 */

namespace zframework;

class App
{
    private static $_baseUrl;
    private static $_assetsUrl;

    public function __construct()
    {
        $this->setUrl();
    }

    private function setUrl()
    {
        $protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") ? "https" : "http";
        $urlTemp = $protocol . "://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]);

        // Definindo a url para os assets.
        self::$_assetsUrl = $urlTemp . "/assets/";

        // Definindo a url base.
        $pos = strpos($urlTemp, strrchr($urlTemp, "/"));
        self::$_baseUrl = substr($urlTemp, 0, $pos) . "/";
    }

    public static function getAssetsUrl()
    {
        return self::$_assetsUrl;
    }

    public static function getBaseUrl()
    {
        return self::$_baseUrl;
    }

    public static function redirect($route=null)
    {
        $location = empty($route) ? self::getBaseUrl() : self::getBaseUrl().$route;
        header("Location: ".$location)  ;
    }

}