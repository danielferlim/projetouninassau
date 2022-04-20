<?php
// Declarando Namespace da classe
namespace Classes;

// Incluindo arquivo de variáveis
include ('config.php');

// Declarando variáveis globais.
use PDO;
use Exception;

// Declarando conexão com o banco de dados.
	class MySql{

		private static $pdo;

		public static function conectar(){
			if(self::$pdo == null){
				try{
				self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					// echo 'Conectado!';
				}catch(Exception $e){
					echo '<h2>Erro ao conectar</h2>';
				}
			}

			return self::$pdo;
		}

	}
?>