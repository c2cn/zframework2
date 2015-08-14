<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 13/08/2015
 * Time: 14:48
 */

namespace app\controllers;

//use zframework\View as View;

class Relatorio extends \zframework\View {

    public function index() {

        $x = "jose carlos";
        $this->view->nome = $x;

        $this->render("relatorio");

    }

    public function sobre() {
        echo "Controller: RELATORIO - Action: SOBRE";
    }

}