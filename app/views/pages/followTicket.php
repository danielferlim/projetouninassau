<!-- Estilizando formulário  -->
<style type="text/css">
    #form{
        padding: 10px;
    }
    .areatxt{
        width: 15%;  
        margin-bottom: 5px;         
    }   
</style>
<!-- Estilizando formulário  -->
<?php
if (isset($_GET['token'])) {
    
        include ('recuperaToken.php');

 } else if (!isset($_GET['token'])) {
        ?>

    <body>
        <div id="form">
        <form>    
        <h3>Digite o Número do seu token</h3>
        <div><input type="text" name="token" class="areatxt"></textarea></div>
        <div><input type="submit" class="btn btn-primary" class="enviar" name="acao" value="Ver Andamento">
        <a type="button" class="btn btn-secondary" href="http://localhost/">Voltar</a></div>
        </form>
        </div>
    </body>

    <?php
        if (isset($_GET['acao'])){       
            include ('recuperaToken.php');      
        }
    } else {
        die('Volte sempre!');
    };
