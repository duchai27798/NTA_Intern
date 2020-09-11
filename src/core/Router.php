<?php

namespace app\core;

/**
 * Class Router
 * @package app\core
 */
class Router
{
    private array $routers = [];
    private Request $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routers['get'][$path] = $callback;
    }

    /**
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routers['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routers[$method][$path];

        if (is_string($callback)) {
            $callback = $this->renderView($callback);
        }

        if (is_array($callback))
        {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        $rootLayout = $this->renderRootLayout();
        $componentLayout = $this->renderViewContent($view, $params);

        return str_replace('{{content}}', $componentLayout, $rootLayout);
    }

    private function renderRootLayout()
    {
        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/root.php';
        return ob_get_clean();
    }

    public function renderViewContent($view, $params)
    {
        if ($params)
        {
            foreach ($params as $key => $value)
            {
                $$key = $value;
            }
        }
        ob_start();
        if (strpos($view, 'dialog'))
        {
            include_once Application::$ROOT_DIR . "/views/dialogs/$view.php";
        }
        else
        {
            include_once Application::$ROOT_DIR . "/views/$view.php";
        }
        return ob_get_clean();
    }
}
