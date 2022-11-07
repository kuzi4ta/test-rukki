<?php

use Entity\Core;

abstract class AbstractApplication {

    protected function _matchRoute(array $routes): array {
        $matchRoute = [];
        $currentUrl = str_replace('/TestApi', '', $this->request->url());
        foreach ($routes as $route) {
            [$method, $apiName, $apiUrl, $controller, $action] = $route;

            if ($apiUrl === null) {
                throw new \Exception('Invalid route in `routes.php` file');
            }
            if ($apiUrl === $currentUrl && $method === $this->request->requestMethod()) {
                $matchRoute = $route;
                break;
            }
        }

        if (count($matchRoute) === 0) {
            throw new \Exception('Not match route');
        }

        return $matchRoute;
    }

    protected function _runController(array $matchRoute, Core\Config $config): void {
        [$method, $apiName, $apiUrl, $controller, $actionName] = $matchRoute;

        $controllerInstance = new $controller($this->request, $config);
        $methodName = "{$actionName}Action";
        if (!method_exists($controllerInstance, $methodName)) {
            throw new \Exception("Undefined action. Please check controller {$controller}");
        }

        $result = $controllerInstance->$methodName($this->request);
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}