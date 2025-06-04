<?php

use Sil\PhpEnv\Env;

if (!function_exists('env')) {
    /**
     * Gets parsed environment variable
     *
     * @param string $key Environment variable name
     * @param mixed $defaultValue Default value
     *
     * @return mixed
     */
    function env(string $key, $defaultValue = null)
    {
        return Env::get($key, $defaultValue);
    }
}
