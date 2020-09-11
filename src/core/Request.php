<?php

namespace app\core;

class Request
{
    /**
     * Get current router url
     * If parameters is existed in url, remove it
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if (!$position)
        {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * Get method of current router url
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}