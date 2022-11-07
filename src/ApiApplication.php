<?php

use Entity\Core;

class ApiApplication extends AbstractApplication {

    public Core\Request $request;

    public function __construct() {
        $this->request = new Core\Request();
    }

    public function run(array $routes, array $config): void {
        try {
            $matchRoute = $this->_matchRoute($routes);
            $localConfig = new Core\Config($config);
            $this->_runController($matchRoute, $localConfig);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

}