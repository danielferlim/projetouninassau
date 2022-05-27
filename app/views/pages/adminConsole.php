<?php

// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin");
    exit;
}

// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin");
    exit;
}

include("header.php");
?>

<style type="text/css"> 
.container{
    margin-top: 10px;
}
.areatxt{
        height: 150px;
        width: 360px;
        margin-top: 2px;
        width: 100%;
    }
</style>

<body>
    <h1 class="my-5">Logado como: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Projeto Uninassau.</h1>   
            <div class="container">   
                <div id="form">
                        <div>
                            <form method="POST">
                                <input type="submit" class="btn btn-primary float-center" class="novos_chamados" name="novos_chamados" value="Novos Chamados">
                                <input type="submit" class="btn btn-secondary float-center" class="historico" name="historico" value="Histórico">
                                <a href="logout" class="btn btn-danger float-center">Logout</a>
                            </form>                         
                     </div>
                </div>  
            <!-- </div> -->
        <hr>  
</body>
</html>
