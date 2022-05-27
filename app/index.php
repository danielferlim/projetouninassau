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

Route::add('/home', function() use ($homeController){
    $homeController->index();
}, 'get');

// Usando page de formulário
Route::add('/enviar', function() use ($homeController){
    $homeController->formTicket();
}, 'get');

// Usando page de acompanhamar do ticket
Route::add('/acompanhar', function() use ($homeController){
    $homeController->followTicket();
}, 'get');

// Chamando page de login admin 
Route::add('/admin', function () use ($homeController){
    $homeController->adminLogin();
}, 'get');

// Chamando page do admin Console
Route::add('/adminConsole', function () use ($homeController){
    $homeController->adminConsole();
}, 'get');

// Chamando page do admin Register
Route::add('/adminRegister', function () use ($homeController){
    $homeController->adminRegister();
}, 'get');

// Chamando page de logout
Route::add('/logout', function() use ($homeController){
    $homeController->adminLogout();
}, 'get');

// Abaixo somente os métodos POST

// Usando method post
Route::add('/enviar', function() use ($homeController){
    $homeController->creatingTicket();
}, 'post');

// Chamando pagina do admin com method post
Route::add('/admin', function () use ($homeController){
    $homeController->adminLogin();
}, 'post');

// Chamando page do admin Register
Route::add('/adminRegister', function () use ($homeController){
    $homeController->adminRegister();
}, 'post');

// Chamando page do admin Actions a partir do adminActions
Route::add('/adminConsole', function () use ($homeController){
    $homeController->adminActions();
}, 'post');


// Acionando o router aqui
Route::run('/');

?>


