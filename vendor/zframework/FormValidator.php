<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 03/09/2015
 * Time: 17:08
 */

namespace zframework;

class FormValidator
{
    //private static $_formdata;
    private $_rules;
    private $_filters;

    public function validate(array $formData)
    {
        var_dump($this->_rules);

        if (!empty($formData)){

        }

    }

    public function setRules(array $rules)
    {
        $this->_rules = $rules;
    }

    public function setFilters()
    {
        return true;
    }

}