<?php
/**
 * Created by 5to5 Web.
 * User: Nik
 * Date: 23.08.14
 * Time: 14:08 
 */

namespace core;


class TemplateEngine
{
    /*protected $templateName = null;
    protected $templateData = null;*/

    function __construct()
    {
    }


    function render($templateName, $templateData)
    {
        extract($templateData,EXTR_SKIP);
        ob_start();
        require($templateName);
        return ob_get_clean();
    }
}