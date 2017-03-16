<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 10:02
 */
class view
{
    private $template;

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

}