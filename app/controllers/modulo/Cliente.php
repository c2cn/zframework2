<?php

/**
 * Date: 14/08/2015
 * Time: 15:00
 */

namespace app\controllers\modulo;

use \zframework\View;
use \zframework\Layout;

class Cliente extends View {

    public function index() {

        $layout = new Layout();
        //$layout->setEnableLayout(true);

        $view = new View();
        $view->render("cliente", $layout);

    }

    public function novo() {
        echo "Controller: CLIENTE - Action: NOVO";
    }

}

?>