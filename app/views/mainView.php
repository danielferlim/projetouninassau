<?php

// Declarando o namespace
namespace Views;

//Declarando classe.
class mainView{
    
    public static function render($file){
        include ('pages/header.php');
        include ('pages/'.$file.'.php');
    }

    public static function renderAdmin($file){
        include('pages/'.$file.'.php');
    }

}

?>
