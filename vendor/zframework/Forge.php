<?php

/**
 * Date: 14/08/2015
 * Time: 15:00
 */

namespace zframework;

/**
 * Classe responsável pelo redirecionamento para as páginas de erro.
 * @package zframework
 * @author José Carlos Gonçalves da Costa <josecarlosgdacosta@gmail.com>
 * @copyright Copyright (c) 2013-2014 José Carlos Gonçalves da Costa
 * @version v 1.0.0
 */
class Forge
{
    use \zframework\traits\ViewTrait;

    /**
     * Método que redireciona para uma página personalizada de erro 404.
     */
    final public function forge404()
    {
        $layout = new Layout();
        $layout->setTitle('404 - Página não encontrada');

        $this->render("errors/404", $layout);
    }

}