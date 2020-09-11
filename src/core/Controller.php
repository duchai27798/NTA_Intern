<?php


namespace app\core;


abstract class Controller
{
    public function render($view, $params = [])
    {
        return Application::$APP->router->renderView($view, $params);
    }

    public function renderComponent($view, $params = [])
    {
        return Application::$APP->router->renderViewContent($view, $params);
    }
}