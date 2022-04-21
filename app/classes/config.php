<?php

#
## essa pasta só será utilizada se o projeto estiver uma subpasta.
$pastaInterna="";

#
## $_SERVER['HTTP_HOST'] vai retornar localhost no ambiente atual.
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}");

# Operador ternário para substituir o if ( ? ) else( : ).
(substr($_SERVER['DOCUMENT_ROOT'], -1)=='/')?$barra="":$barra="/";

# Caso precise da barra antes da pasta será inserido pela variável anterior.
## $_SERVER['DOCUMENT_ROOT'] vai retornar /var/www/html
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}");


//Exemplo para definir atalhos
// define('DIRIMG' ,DIRPAGE.'img/');

// # ATALHO PARA CHAMADOS
define('DIRCHAMADO', DIRPAGE.'/acompanhar');

//Acesso ao db
define('HOST', "mariadb");
define('DATABASE', 'alpha_db');
define('USER', 'alpha');
define('PASSWORD', 'T14dm00');
define('SENHAEMAIL', '34kcH901@3!23');