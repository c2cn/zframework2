<?php

namespace zframework;

class View {

    protected $view;

    public function __construct() {

        $this->view = new \stdClass();

    }

    protected function render($viewName, $hasLayout=true) {

        require_once("../app/views/".$viewName.".phtml");

    }

}