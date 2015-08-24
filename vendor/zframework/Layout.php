<?php

/**
 * Date: 14/08/2015
 * Time: 15:00
 */

namespace zframework;

/**
 * Classe responsável por gerenciar o layout padrão da aplicação.
 * @package zframework
 * @author José Carlos Gonçalves da Costa <josecarlosgdacosta@gmail.com>
 * @copyright Copyright (c) 2013-2014 José Carlos Gonçalves da Costa
 * @version v 1.0.0
 */
class Layout
{
    /** @var boolean Verifica se a aplicação utilizará ou não um layout padrão. */
    protected $_enableLayout = true;

    /** @var string Armazena o título de uma view. */
    protected $_title;

    /**
     * Método reponsável por armazenar a opção que habilita layout padrão no atributo da classe.
     * @param boolean $enableLayout Opção que habilita o layout padrão.
     */
    public function setEnableLayout($enableLayout)
    {
        $this->_enableLayout = $enableLayout;
    }

    /**
     * Método responsável por armazenar o título da view no atributo da classe.
     * @param string $title Título da view.
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Método responsável por retornar a opção que habilita o layout padrão da aplicação.
     * @return boolean Opção que habilita o layout padrão.
     */
    public function getEnableLayout()
    {
        return $this->_enableLayout;
    }

    /**
     * Método responsável por retornar o título da view.
     * @return string Título da view.
     */
    public function getTitle()
    {
        return $this->_title;
    }

}

?>