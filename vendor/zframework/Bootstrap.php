<?php

namespace zframework;

class Bootstrap {

    private $_arrUrlObjects;
    private $_module;
    private $_controller;
    private $_action;

    public function __construct() {

        $this->prepareUrl();
        $this->setModule();
        $this->setController();
        $this->setAction();

    }

    protected function getUrl() {

        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    }

    protected function prepareUrl() {

        $separate = explode("/", $this->getUrl());

        if (end($separate) == null) {
            array_pop($separate);
        }

        $this->_arrUrlObjects = array_slice($separate, 2);

    }

    protected function getAppModules() {

        $controllersDir = "../app".DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR."*";
        $arrModulePath = glob($controllersDir, GLOB_ONLYDIR);
        $modules = array();

        if (!empty($arrModulePath)) {

            foreach ($arrModulePath as $modulePath) {
                $tmp = explode(DIRECTORY_SEPARATOR, $modulePath);
                array_push($modules, end($tmp));
            }

        }

        return $modules;

    }

    protected function setModule() {

        $arrAppModules = $this->getAppModules();
        $urlModule = !empty($this->_arrUrlObjects) ? current($this->_arrUrlObjects) : null;

        if (!empty($arrAppModules)) {
            $moduleKey = array_search($urlModule, $arrAppModules);
            $this->_module = $moduleKey !== false ? $arrAppModules[$moduleKey] : $this->_module;
        }

    }

    protected function setController() {

        if ($this->_module === null) {
            reset($this->_arrUrlObjects);
            $this->_controller = ucfirst(current($this->_arrUrlObjects));
        } else {
            $this->_controller = ucfirst($this->_arrUrlObjects[1]);
        }

    }

    protected function setAction() {

        $actionKey = $this->_module === null ? 1 : 2;
        $action = !isset($this->_arrUrlObjects[$actionKey]) ? "index" : $this->_arrUrlObjects[$actionKey];
        $this->_action = $action;

    }

    public function run() {

        if (isset($this->_module)) {
            $controllerPath = "app\\controllers\\".$this->_module."\\".$this->_controller;
        } else {
            $controllerPath = "app\\controllers\\".$this->_controller;
        }

        if (!class_exists($controllerPath)) {

            throw new \Exception("NAO EXISTE ESTA CLASSE");

        } else {

            $action = $this->_action;
            $controller = new $controllerPath();

            if (!method_exists($controller, $action)) {
                throw new \Exception("ACTION INEXISTENTE");
            }

            $controller->$action();

        }

    }

}