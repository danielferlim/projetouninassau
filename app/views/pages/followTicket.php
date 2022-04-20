<?php

if (isset($_GET['token'])) {
    
    // Recuperando URI 
    // $url = $_SERVER['REQUEST_URI'];
    // Dividindo String pelo delimitador '='
    // $url = explode('=', $url);
    // Recuperando token
    // $token=$url[1];
    $token = $_GET['token'];

    //Recuperando ticket do banco de dados.
    $sql = \Classes\MySql::conectar()->prepare("SELECT * FROM chamados WHERE token=?");
    $sql->execute([$token]);    


    // Verificando se o token existe no banco de dados.
    if($sql->rowCount() == 1 ){
        //
        $result = $sql->fetchAll();
        // 
        foreach ($result as $row => $value ) {
        echo ' Nome: ' . $value['nome'] . '</br>';
        echo ' Email: ' . $value['email'] . '</br>';            
        echo ' Pergunta: ' . $value['pergunta'] . '</br>';       
        echo '<hr>';
        }   
    }else{
        die('Bye!');
    }
    
    // Ver resposta do suporte!
    

}else{
    die('Você não inseriu um token!');
}

