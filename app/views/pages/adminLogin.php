<?php

//Iniciar sessão
session_start();

// Verificando se a sessão existe
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   header("location: adminConsole");
   exit;
}

// Verificar se existe algum usuário no banco
if($stmt = \Classes\MySql::conectar()->prepare("SELECT id, username, password FROM users")){        
        if($stmt->execute()){            
            if($stmt->rowCount() == 0){
                header("location: adminRegister");
                exit;
            }
        }
    }    

$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Verifique se o nome de usuário está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, insira o nome de usuário.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Verifique se a senha está vazia
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar credenciais
    if(empty($username_err) && empty($password_err)){

        // Prepare uma declaração selecionada
        $pdo = \Classes\MySql::conectar();        
        if($stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username")){

            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        
                        if(password_verify($password, $hashed_password)){
                        //if($password == $user_password){
                            // A senha está correta, então inicie uma nova sessão
                            session_start();
                            
                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirecionar o usuário para a página de boas-vindas
                            header("location: adminConsole");

                        } else{
                            // A senha não é válida, exibe uma mensagem de erro genérica
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else{
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}

include("header.php");
?>

<style>
    .container{
        width: 300px;
        margin-top: 25px;
    }
</style>

<body>
    <div class="container">
        <div class="wrapper">
            <h2>Login</h2>
            <p>Por favor, preencha os campos para fazer o login.</p>

            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Nome do usuário</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <label>Senha</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Entrar">
                    <a type="button" id="voltar" class="btn btn-secondary" href="http://localhost/">Homepage</a></div>
                </div>
            <!-- <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p> -->
        </form>
    </div>
</body>
</html>