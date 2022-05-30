<?php
include("header.php");
?>
<style> 
#form{
        width:100%;
        padding-left: 15px;
        padding-top: 10px;
        
    }
    .textarea{
        width: 100%;  
        margin-top: 2px;      
    } 
    .areatxt{
        height: 250px;
        width: 100%;
        margin-top: 2px;
        width: 100%;
    }
</style>

<?php
if(isset($_POST['historico'])){
        
        $sql = \Classes\MySql::conectar()->prepare(" SELECT * FROM chamados WHERE resposta=1 ");
        $sql->execute();
        // Verificando se o token existe no banco de dados.
        if($sql->rowCount() !== 0 ){            
            $result = $sql->fetchAll();   
        ?>
        <div class="container">
            <div class="card" >
                <?php 
                    foreach ($result as $row => $value ) {
                ?>                            
            <div class="card-header">
                <h5>
                    <div class="nome_cliente">    
                        <?php
                            echo ' Nome: ' . $value['nome'] . '</br>';         
                        ?>
                    </div>
                </h5>
            </div>                
            <div class="card-body">
                <p class="card-text" id="pergunta">
                    <?php
                        echo ' Pergunta: ' . $value['pergunta'] . '</br>';
                        echo "</br>";
                        echo ' Token: ' . $value['token'] . '</br>';     
                        echo "</br>";
                        echo ' Resposta: ' . $value['resposta_admin'] . '</br>';    
                    ?>        
                    <form method="post">                           
                          <input type="submit" class="btn btn-danger" name="deletar_pergunta" value="Deletar Pergunta" /> 
                          <input type="hidden" name="token" value="<?php echo $value['token'] ?>" />
                    </form> 
                </p>
            </div>  

                        <?php        
                    }
                ?>         
            </div>   
        <?php
    }else{
        echo '<script>alert("Não há histórico para ser exibido!")</script>';
        echo '<script>history.go(-1)</script>';
    }


}

if(isset($_POST['novos_chamados'])){
        
    $sql = \Classes\MySql::conectar()->prepare(" SELECT * FROM chamados WHERE resposta=0 ");
    $sql->execute();
    // Verificando se o token existe no banco de dados.
    if($sql->rowCount() !== 0 ){            
        $result = $sql->fetchAll();   
    ?>
    <div class="container"> 
        <div class="card" >
            <?php 
                foreach ($result as $row => $value ) {
            ?>                            
        <div class="card-header">
            <h5>
                <div class="nome_cliente">    
                    <?php
                        echo ' Nome: ' . $value['nome'] . '</br>';         
                    ?>
                </div>
            </h5>
        </div>                
        <div class="card-body">
            <p class="card-text" id="pergunta">
                <?php
                    echo ' Pergunta: ' . $value['pergunta'] . '</br>';
                    echo "</br>";
                    echo ' Token: ' . $value['token'] . '</br>';     
                    echo "</br>";
                    ?> 
                    <form method="post">
                          <textarea class="areatxt" name="resposta" placeholder="Resposta do Admin..."></textarea>      
                          <input type="submit" class="btn btn-primary" name="enviar_resposta" value="Enviar Resposta" />                           
                          <input type="submit" class="btn btn-danger" name="deletar_pergunta" value="Deletar Pergunta" /> 
                          <input type="hidden" name="token" value="<?php echo $value['token'] ?>" />
                    </form>  
            </p>
        </div>          
    <?php        
}
    ?>         
        </div>   
    <?php
    }else{
        echo '<script>alert("Não há novos chamados!")</script>';
        echo '<script>history.go(-1)</script>';
    }
}

if(isset($_POST['enviar_resposta'])){
    
    $status = '1';
    $query = "UPDATE chamados SET resposta_admin = :resposta_admin, 
          resposta = :status 
          WHERE token = :token";
       
    $stmt = \Classes\MySql::conectar()->prepare($query);

    $stmt->bindParam(':resposta_admin', $_POST['resposta'], PDO::PARAM_STR);     
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);    
    $stmt->bindParam(':token', $_POST['token'], PDO::PARAM_STR);
    $stmt->execute();

    echo '<script>alert("Resposta Enviada com sucesso!")</script>';
    echo '<script>history.go(-1)</script>';

}

if(isset($_POST['deletar_pergunta'])){

    $query = "DELETE FROM chamados WHERE token = :token";           
       
    $stmt = \Classes\MySql::conectar()->prepare($query);        
    $stmt->bindParam(':token', $_POST['token'], PDO::PARAM_STR);
    $stmt->execute();

    echo '<script>alert("Pergunta deletada com sucesso!")</script>';
    echo '<script>history.go(-1)</script>';

}


?>