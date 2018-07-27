<?php

spl_autoload_register(function($className)
{
    $dirClass = "class";
    $filename = $dirClass.DIRECTORY_SEPARATOR.$className.".php";
    if(file_exists($filename))
    {
        require_once ($filename);
    }

});

?>