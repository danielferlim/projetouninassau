<!-- Estilizando formulário  -->
<style type="text/css"> 
    .container{
        margin-top: 10px;
    }
    .my-2{
        text-align: center;
    }
    #form{
        width:100%;
        padding-left: 15px;
        padding-top: 10px;
        
    }
    .textarea{
        width: 100%;  
        margin-top: 2px;      
    }
    .nome{
        width: 100%;  
        margin-top: 2px;
        width: 100%;
    }
    .email{
        margin-top: 2px; 
        width: 100%;
    }
    .areatxt{
        height: 250px;
        width: 100%;
        margin-top: 2px;
        width: 100%;
    }
    .enviar{
        margin-top: 2px;
        float: right;
    }   
    #voltar{
        margin-right: 2px;
    }
</style>

<body>
<!-- Formulário -->
<div class="container"> 
<h3 class="my-2">Crie um ticket para nosso sistema de atendimento . Projeto Uninassau.</h3> 
    <div id="form">
        <form method="POST">
            <div><input type="text" class="nome" name="nome" placeholder="Digite seu nome"></div>
            <div><input type="email" class="email" name="email" placeholder="Seu Email"></div>
            <div><textarea name="pergunta" class="areatxt" placeholder="Sua Mensagem"></textarea></div>
            <div><input type="submit" class="btn btn-primary float-right" class="enviar" name="acao" value="Enviar!">
            <a type="button" id="voltar" class="btn btn-secondary float-sm-right" href="http://localhost/">Voltar</a></div>
        </form>        
    </div>
</body>