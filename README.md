# Controle de bolos

Este projeto foi desenvolvido em **Laravel 8**, com a proposta de simular um site para realizar o crud de bolos e com a inteção de enviar e-mails utilizando o conceito de listas.


## Requisitos Necessarios
- Versão do PHP mínima 7.3.0
- MySQL - 10.4.10-MariaDB
- Composer

## Etapas
1. Abra o diretorio do projeto  no cmd e execute <b>composer update</b>
2. No diretorio raiz do projeto <b>controle-bolos/</b> no arquivo **.env.example** retire o **.example**, vai deixe **.env**
3. No MySQL crie um Banco de Dados com o nome <b> controle_-_bolos</b>
4. Caso queira executar sem dados de teste - Abra o diretorio do projeto  no cmd e execute <b>php artisan migrate:fresh</b>.
4. Caso queira executar com dados de teste - Abra o diretorio do projeto  no cmd e execute <b>php artisan migrate:fresh --seed</b>. Esse comando vai criar todas as tabelas e populas as necessárias.
5. Abra o diretorio do projeto  no cmd e execute <b>php artisan serve</b>.
6. Para executar a fila de envio de e-mails, basta rodar o comando  **php artisan queue:work --tries=3** em um novo cmd.
7. No **App/Console/Kernel.php**, foi inserido a função para realizar o controle de envio de emails, ou seja, se quando o e-mail informado não tinha quantidade de bolo, ele vai ficar monitorando, para quando o bolo tiver disponivel disparar o e-mail.
8. Foi utilizado o **https://mailtrap.io/** 
9. Para utilizar o serviço, basta criar a conta no mailtrap, e na opção api ele irá gerar o codigo para inserir no **.env** do Laravel.
***MAIL_HOST=smtp.mailtrap.io***
***MAIL_PORT=2525***
***MAIL_USERNAME=xxxxxxx***
***MAIL_PASSWORD=xxxxxxx***
***MAIL_ENCRYPTION=tls***
***MAIL_FROM_ADDRESS=xxxxxxx***

10. Agora é só acessar **http://localhost:8000/**
## Observação

- Caso precise, na pasta raiz do projeto tem um arquivo **controle_bolos.sql**, no qual é o script da banco de dados já populado com as informações mais importantes.