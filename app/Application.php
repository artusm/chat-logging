<?php

namespace App;

use Laravel\Lumen\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * Get the current HTTP path info.
     *
     * @return string
     */
    public function getPathInfo()
    {
        $baseUrl = trim(env('APP_BASE_URL', ''), '/');

        return '/'. trim(str_replace($baseUrl, '', parent::getPathInfo()), '/');
    }
}