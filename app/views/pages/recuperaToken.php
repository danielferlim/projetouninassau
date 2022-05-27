<?php include("header.php") ?>

<style type="text/css">

.card{
    padding-left: 15px;
    padding-top: 10px;
    padding-right: 15px;
}
#nome{
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 10px;
}
#pergunta{
    padding-left: 15px;
    padding-top: 2px;
}

</style>

<!-- Fim do style -->

<?php
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
        
        $result = $sql->fetchAll();
        ?> <!-- -->

        <div class="container">
            <div class="card" >        
                <?php 
                    foreach ($result as $row => $value ) {
                ?>                 
                
                <div class="card-header">
                    <h5>
                        <?php
                            echo ' Nome: ' . $value['nome'] . '</br>'; 
                        ?>            
                    </h5>
                </div>
                    
            <div class="card-body">
                <p class="card-text" id="pergunta">
                    <?php
                        echo ' Pergunta: ' . $value['pergunta'] . '</br>';
                    ?>            
                </p>
            </div>  

        <?php        
        }
        ?>         
        </div>      
        <?php        

    }else{
        ?>
            <div class="alert alert-danger" role="alert">
                O token informado não existe.
            </div>
        <?php
    };    
    ?>
        <a type="button" class="btn btn-link btn-lg" href="http://localhost/acompanhar">Voltar</a>
    <?php

