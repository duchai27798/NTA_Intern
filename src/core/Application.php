<?php

namespace app\core;

/**
 * Class Application
 * @package app\core
 */
class Application
{
    public static string $ROOT_DIR;
    public static Application $APP;

    public Router $router;
    public Request $request;

    public function __construct(string $rootDir)
    {
        self::$ROOT_DIR = $rootDir;
        self::$APP = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
