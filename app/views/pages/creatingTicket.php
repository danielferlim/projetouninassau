<?php
include("header.php");

if(isset($_POST['acao'])){

    // recuperando email do forms
    $email = $_POST['email'];
    
    // Validando e-mail 
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validaEmail = true;        
    }else{
        echo '<script>alert("Email inválido! Tente novamente")</script>';
        echo '<script>history.go(-1)</script>';
        exit;        
    };  

    // recuperando nome
    $nome = $_POST['nome'];
    
    // recuperando pergunta do forms
    $pergunta = $_POST['pergunta']; 
    
    // function para gerar token simples alfanumerico
    $n=5;
    function getToken($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i <= $n; $i++) {
        $randomValue = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$randomValue];             
    }  
    return $randomString;
    }
    
    // Atribuindo o token a uma variável.
    $token= getToken($n);

    // query usada pra persistir o chamado no mariadb
    $sql = \Classes\MySql::conectar()->prepare("INSERT INTO chamados VALUES(null,?,?,?,?,?,?)");
    $sql->execute(array($pergunta,$nome,$email,$token,0,null));      
    
    //PHPMailer
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;           //Enable verbose debug output

        $mail->isSMTP();                                                      //send using SMTP
        $mail->Host       = 'smtp.gmail.com';                                 //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                             //Enable SMTP authentication
        $mail->Username   = 'danielferlim@gmail.com';                           //SMTP username
        $mail->Password   = SENHAEMAIL;                                            //SMTP password
        $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;   //Encrypt
        $mail->Port       = 587;                                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('danielferlim@gmail.com', 'Helpdesk');
        $mail->addAddress($email, $nome);     //Add a recipient
                        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Seu chamado foi aberto';
        
        // Criando url para cliente -- DIRCHAMADO existe em config.php nas classes
        $url= DIRCHAMADO.'?token='.$token;

        // Criando variável usada no Body do Email
        $informacoes = 'Seu chamado foi aberto! Acesse pelo link: <br />
        <a href="'.$url.'">Acessar Chamado</a>';
        
        // Atribuindo variável ao body e enviando e-mail
        $mail->Body = $informacoes;             
        $mail->send();  
        
        // Fechando PHP para disparar mensagem com estilo do bootstrap
        ?>
        
        <!-- mensagem estilizada com bootstrap4 -->             
        <div class="alert alert-success" role="alert">        
            <h5>Email enviado com sucesso!!! O seu ticket é: <strong> <?php echo $token; ?> </strong></h5>
        </div>
        <a type="button" class="btn btn-link btn-lg" href="http://localhost">Voltar</a>                
        
        <!-- mensagem estilizada com bootstrap4 -->

        <?php //Abrindo novamente o PHP

    } catch (Exception $e) {
        echo "Que pena! Não conseguimos enviar o email: {$mail->ErrorInfo}";
    }        
}
?>


