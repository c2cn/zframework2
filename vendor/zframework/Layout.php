<?php

namespace zframework;

class Layout {

    protected $_enableLayout;
    protected $_title;

    public function setEnableLayout($enableLayout) {
        $this->_enableLayout = $enableLayout;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function getEnableLayout() {
        return $this->_enableLayout;
    }

    public function getTitle() {
        return $this->_title;
    }

}