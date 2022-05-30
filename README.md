# projetouninassau
Projeto Docker/Nginx/PHP/Mariadb

# 1. Subindo a infra

Requisitos:
 
* Instalar docker engine e docker-compose. Segue abaixo documentação para referencia.

DOCKER ENGINE
https://docs.docker.com/engine/install/ubuntu/

DOCKER COMPOSE
https://github.com/docker/compose/releases

DICAS:
Se for windows, deve ter WSL2 ativado.

# 2. Arquivos de configuração

* Alterar o nome dos seguintes arquivos

       - docker-compose_sample.yml para docker-compose.yml

* Definir os valores da seguintes variáveis do docker-compose.yml

      - MYSQL_ROOT_PASSWORD=senha_do_root
      - MYSQL_PASSWORD=senha_user1
      - MYSQL_USER=nome_user1
      - MYSQL_DATABASE=nome_do_banco_que_utilizaremos

* alterar o nome do seguinte arquivo config.php

      - app/classes/config_sample.php para app/classes/config.php
    
* Definir os valores na parte do e-mail e database do arquivo config.php

      - define('HOST', "valor_do_docker_compose_container_name:");
      - define('DATABASE', 'base_do_docker_compose_MYSQL_DATABASE');
      - define('USER', 'usuario_do_docker_compose_MYSQL_USER');
      - define('PASSWORD', 'senha_do_docker_compose_MYSQL_PASSWORD');
      - define('SENHAEMAIL', 'senha_do_email_utilizado_no_phpmailer');

# 3. Arquivos de logs do Nginx

* Locais para consultar possiveis erros ou falhas

      - nginx_logs/Nginx/access.log
      - nginx_logs/Nginx/error.log 
     
# 4. Criar as seguintes pastas na raiz do projeto

* Pasta onde ficará o banco de dados e pasta de logs.

      - app_data 
      - nginx_logs/Nginx

# 5. Importar o modelo de banco de dados no mariadb com esqueleto do sistema.

* O Comando deve ser executado com os containers em execução.

      - docker exec -i mariadb sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD"' < database.sql

# 6. Composer modelo

      - {
    "name": "vendor/app",
    "description": "App de Atendimento",
    "autoload": {
        "psr-4": {
            "Vendor\\App\\": "src/",
            "Classes\\": "../classes/",
            "Models\\": "../models/",
            "Views\\": "../views/",
            "Controllers\\": "../controllers/"
        }
    },
    "authors": [
        {
            "name": "Daniel",
            "email": "danielima3@gmail.com"
        }
    ],
    "require": {
        "phpmailer/phpmailer": "^6.6"
    }
}



