<?php

namespace zframework;

class View {

    protected $_view;
    protected $_viewFileName;
    protected $_layout;

    public function __construct() {

        $this->_view = new \stdClass();

    }

    protected function render($viewName, \zframework\Layout $layout) {

        $this->_viewFileName = $viewName;
        $layoutFilePath = "../app/views/layout/layout.phtml";

        $this->_layout = $layout;

        if ($layout->getEnableLayout() && file_exists($layoutFilePath)) {
            require_once($layoutFilePath);
        } else {
            $this->getContent();
        }

    }

    protected function getContent() {

        $fileNamePath = "../app/views/".$this->_viewFileName.".phtml";

        if (file_exists($fileNamePath)) {
            require_once("../app/views/".$this->_viewFileName.".phtml");
        }

    }

}