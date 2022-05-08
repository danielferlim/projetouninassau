<?php

// 
// #essa pasta só será utilizada se o projeto estiver uma subpasta.
// $pastaInterna="";

#
## $_SERVER['HTTP_HOST'] vai retornar localhost no ambiente atual.
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}");

# 
# Operador ternário para substituir o if ( ? ) else( : ).
(substr($_SERVER['DOCUMENT_ROOT'], -1)=='/')?$barra="":$barra="/";

# Caso precise da barra antes da pasta será inserido pela variável anterior.
## $_SERVER['DOCUMENT_ROOT'] vai retornar /var/www/html
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}");

// # ATALHO PARA CHAMADOS
define('DIRCHAMADO', DIRPAGE.'/acompanhar');

// 
//Acesso ao db
define('HOST', "valor_do_docker_compose_container_name:");
define('DATABASE', 'base_do_docker_compose_MYSQL_DATABASE');
define('USER', 'usuario_do_docker_compose_MYSQL_USER');
define('PASSWORD', 'senha_do_docker_compose_MYSQL_PASSWORD');
define('SENHAEMAIL', 'senha_do_email_utilizado_no_phpmailer');