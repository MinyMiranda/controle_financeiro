# Blend - Processo Seletivo
Este projeto foi proposto como etapa para seleção para Desenvolvedor backend.

# Sobre o projeto
O projeto consiste em uma api simples de controle financeiro.<br>

As ações possíveis no projeto são:

- Criar usuário.
- Verificar Saldo. 
- Verificar Extrato. 
- Realizar débito. 
- Realizar crédito.
- Realizar transferências. 

# Tecnologias

Para construção do projeto foi utilizado a seguinte tecnologia:
- Laravel versão 8.
 
# Instalação 
- Pré requisitos:
     - Servidor web
     - PHP >= 7.2
     - Composer
- Rode os comandos.
     - composer install
     - cp .env.example .env
     - php artisan key:generate 
- Configure no seu .env os dados do seu banco de dados
- Rode o comando
     - php artisan migrate:fresh --seed
