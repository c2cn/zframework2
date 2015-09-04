<?php

/**
 * Date: 14/08/2015
 * Time: 15:00
 */

namespace app\controllers;

use \zframework\Layout;
use \zframework\FormValidator;
use \zframework\abstracts\Controller;

/**
 * Classe que representa o controller inicial da aplicação.
 * @package app\controllers
 * @author José Carlos Gonçalves da Costa <josecarlosgdacosta@gmail.com>
 * @copyright Copyright (c) 2013-2014 José Carlos Gonçalves da Costa
 * @version v 1.0.0
 */
class Init extends Controller
{
    use \zframework\traits\ViewTrait;

    /**
     * Método que representa a action inicial do controller.
     */
    public function index()
    {
        return false;
    }

    public function generateModels()
    {
        $this->_view->paramsView = array(1,2,3,4,5);
        $this->render("init/generate-models", new Layout());
    }

    public function tratarForm()
    {
        $rules = array(
            array("field"=>"email", "required"=>true, "alias"=>"E-mail", "message"=>"Este campo é obrigatório."),
            array("field"=>"email", "max"=>18, "alias"=>"E-mail", "message"=>"Este campo é obrigatório.")
        );

        $filters = array();
       //S var_dump($rules);exit;

        $formValidator = new FormValidator();
        $formValidator->setRules($rules);
        $formValidator->setFilters($filters);
        $formValidator->validate($_POST);
        //FormValidatorvalidate($_POST, array(), array());
    }
}

?>