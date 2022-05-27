<!-- Estilizando formulário  -->
<style type="text/css">
    .container{
        margin-top: 10px;
    }
    #form{
        padding: 10px;
        text-align: center;
    }
    .areatxt{
        width: 35%;  
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
        <div class="container">
            <div id="form">
                <form>    
                <h3>Digite o Número do seu token</h3>
                <div><input type="text" name="token" class="areatxt"></textarea></div>
                <div><a type="button" class="btn btn-secondary" href="http://localhost/">Voltar</a>        
                <input type="submit" class="btn btn-primary" class="enviar" name="acao" value="Ver Andamento"></div>
                </form>
            </div>
    </body>

    <?php        
    } else {
        die('Volte sempre!');
    };
