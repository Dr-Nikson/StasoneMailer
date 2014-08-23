<?php
/**
 * Created by 5to5 Web.
 * User: Nik
 * Date: 03.06.13
 * Time: 18:01 
 */

namespace core\autoload;


return
/**
 *
 */
function($class_name)
{
    // удаляем ненужные символы слева
    $class_name = ltrim($class_name, '\\');

    if(empty($class_name))
        throw new \Exception('Autoload failed - no class name');

    $path = str_replace('\\', '/', $class_name);
    $path .= '.php';

    if(file_exists($path))
        require($path);
};