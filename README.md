# Projeto para matéria de Banco de Dados na Universidade Federal de Sergipe

### Etapas para rodar o projeto:
 * Clonar o repositório:
    - ```
          git clone https://github.com/Itor-Carlos/Trabalho-BancoDeDados-Laravel.git
      ```
 * Rode o comando abaixo dentro da pasta do projeto:
    - ```
          docker-compose up -d 
      ```
 * Crie um arquivo ".env" no diretorio do projeto e cole o seguinte conteudo:
      ```
            APP_NAME=Laravel
            APP_ENV=local
            APP_KEY=base64:VKTszWY+hY0wB3IVpBaLR27QvRzgt+o5+4QPIbnz2XM=
            APP_DEBUG=true
            APP_URL=http://localhost
            
            LOG_CHANNEL=stack
            LOG_DEPRECATIONS_CHANNEL=null
            LOG_LEVEL=debug
            
            DB_CONNECTION=pgsql
            DB_HOST=127.0.0.1
            DB_PORT=5432
            DB_DATABASE=atividade_individual
            DB_USERNAME=root
            DB_PASSWORD=root
            
            BROADCAST_DRIVER=log
            CACHE_DRIVER=file
            FILESYSTEM_DISK=local
            QUEUE_CONNECTION=sync
            SESSION_DRIVER=file
            SESSION_LIFETIME=120
            
            MEMCACHED_HOST=127.0.0.1
            
            REDIS_HOST=127.0.0.1
            REDIS_PASSWORD=null
            REDIS_PORT=6379
            
            MAIL_MAILER=smtp
            MAIL_HOST=mailpit
            MAIL_PORT=1025
            MAIL_USERNAME=null
            MAIL_PASSWORD=null
            MAIL_ENCRYPTION=null
            MAIL_FROM_ADDRESS="hello@example.com"
            MAIL_FROM_NAME="${APP_NAME}"
            
            AWS_ACCESS_KEY_ID=
            AWS_SECRET_ACCESS_KEY=
            AWS_DEFAULT_REGION=us-east-1
            AWS_BUCKET=
            AWS_USE_PATH_STYLE_ENDPOINT=false
            
            PUSHER_APP_ID=
            PUSHER_APP_KEY=
            PUSHER_APP_SECRET=
            PUSHER_HOST=
            PUSHER_PORT=443
            PUSHER_SCHEME=https
            PUSHER_APP_CLUSTER=mt1
            
            VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
            VITE_PUSHER_HOST="${PUSHER_HOST}"
            VITE_PUSHER_PORT="${PUSHER_PORT}"
            VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
            VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
            
            L5_SWAGGER_CONST_HOST=http://projeto_individual/api/v1

      ```
 * Comando para rodar as migrates:
    - ```
          php artisan migrate
      ```
 * Comando para rodar a aplicação:
    - ```
          php artisan serve
      ```
 * Comando para gerar a documentação:
   - ```
         php artisan l5-swagger:generate
     ```
