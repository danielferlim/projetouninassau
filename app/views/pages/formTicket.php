<!-- Estilizando formulário  -->
<style type="text/css"> 
    #form{
        width:35%;
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
        height: 120px;
        width: 100%;
        margin-top: 2px;
        width: 100%;
    }
    .enviar{
        margin-top: 2px;
        float: right;
    }   
</style>

<!-- Formulário -->
<div id="form">
<form method="POST">
    <div><input type="text" class="nome" name="nome" placeholder="Digite seu nome"></div>
    <div><input type="email" class="email" name="email" placeholder="Seu Email"></div>
    <div><textarea name="pergunta" class="areatxt" placeholder="Sua Mensagem"></textarea></div>
    <div><input type="submit" class="enviar" name="acao" value="Enviar!"></div>
</form>
</div>
