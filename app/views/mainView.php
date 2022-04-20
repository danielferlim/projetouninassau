<?php

// Declarando o namespace
namespace Views;

//Declarando classe.
class mainView{
    public static function render($file){
        include ('pages/'.$file.'.php');
    }
}

?>
