<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 13/08/2015
 * Time: 14:48
 */

namespace app\controllers;

use zframework\View as View;

class Relatorio extends View {

    public function index() {

        $x = "Tela com os filtros do relatório.";
        $this->_view->nome = $x;

        $layoutObject = new \zframework\Layout();
        $layoutObject->setEnableLayout(true);
        $layoutObject->setTitle("Relatório");

        $this->render("relatorio", $layoutObject);

    }

    public function sobre() {
        echo "Controller: RELATORIO - Action: SOBRE";
    }

}