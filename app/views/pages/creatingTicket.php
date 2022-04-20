<?php
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
    //recuperando nome
    $nome = $_POST['nome'];
    // recuperando pergunta do forms
    $pergunta = $_POST['pergunta']; 
    
    // func para gerar token simples alfanumerico
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

    //$token= uniqid();
    $token= getToken($n);

    // query usada pra persistir o chamado no mysql
    $sql = \Classes\MySql::conectar()->prepare("INSERT INTO chamados VALUES(null,?,?,?,?)");
    $sql->execute(array($pergunta,$nome,$email,$token));
    // JS para mensagem na tela.
    echo '<script>alert("Seu chamado foi aberto e você receberá um e-mail de acompanhamento")</script>';   
   
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
        //
        $url= DIRCHAMADO.'?token='.$token;
        $informacoes = 'Seu chamado foi aberto! Acesse pelo link: <br />
        <a href="'.$url.'">Acessar Chamado</a>';
        //
        $mail->Body = $informacoes;             
        $mail->send();
        
        echo 'Email enviado com sucesso! <br />';
        echo "O seu ticket é: $token";

    } catch (Exception $e) {
        echo "Que pena! Não conseguimos enviar o email: {$mail->ErrorInfo}";
    }

        
}
?>

