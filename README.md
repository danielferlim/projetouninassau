# projetouninassau
Projeto Docker/Nginx/PHP/Mariadb

1. Subindo a infra

Requisitos:
 
* Instalar docker engine e docker-compose. Segue abaixo documentação para referencia.

DOCKER ENGINE
https://docs.docker.com/engine/install/ubuntu/

DOCKER COMPOSE
https://github.com/docker/compose/releases

DICAS:
Se for windows, deve ter WSL2 ativado.
____________________________________________________________

2. Arquivos de configuração

* Alterar o nome dos seguintes arquivos
docker-compose_sample.yml para docker-compose.yml

* Definir os valores da seguintes variáveis do docker-compose.yml

#      - MYSQL_ROOT_PASSWORD=senha_do_root
#      - MYSQL_PASSWORD=senha_user1
#      - MYSQL_USER=nome_user1
#      - MYSQL_DATABASE=nome_do_banco_que_utilizaremos

* alterar o nome do seguinte arquivo config.php

app/classes/config_sample.php para app/classes/config.php

* Definir os valores na parte do e-mail do arquivo config.php

3. Criar as seguintes pastas na raiz do projeto

app_data/
nginx_logs/Nginx/


