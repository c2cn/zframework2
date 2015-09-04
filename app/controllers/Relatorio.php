<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 13/08/2015
 * Time: 14:48
 */

namespace app\controllers;

use zframework\Layout;

class Relatorio {

    use \zframework\traits\ViewTrait;

    public function index() {

        $layoutObject = new Layout();
        $layoutObject->setEnableLayout(true);
        $layoutObject->setTitle("Relatório");

        $this->render("relatorio", $layoutObject);

    }

    public function sobre() {
        echo "Controller: RELATORIO - Action: SOBRE";
    }

}

?>