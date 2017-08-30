<?php
namespace App\Helper;

class Html
{
    public static function currentUri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function currentUriWithQuery($params = [])
    {
        $uri = self::currentUri();

        $queryString = http_build_query($params);

        return $uri.'?'.$queryString;
    }

}
