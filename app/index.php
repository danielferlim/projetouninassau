<?php
// incluindo arquivos de variáveis
include ('classes/config.php');
// Incluindo o autoload do composer
require_once __DIR__ . '/libs/vendor/autoload.php';


// Declarando namespaces que utilizaremos
// Database
use Classes\MySql;
// Roteamento de requisicoes
use Classes\Route;
// Controllers
use Controllers\homeController;

// Extensão para enviar email PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Instanciando controlador homeController
$homeController = new homeController();

// Index method get
Route::add('/', function() use ($homeController){
    $homeController->index();
}, 'get');

// Usando method get
Route::add('/enviar', function() use ($homeController){
    $homeController->formTicket();
}, 'get');


// Usando method post
Route::add('/enviar', function() use ($homeController){
    $homeController->creatingTicket();
}, 'post');


// Usando method get
Route::add('/acompanhar', function() use ($homeController){
    $homeController->followTicket();
}, 'get');


// Acionando o router aqui
Route::run('/');

?>


