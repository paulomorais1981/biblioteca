<?php
   # Dados para a conexão com o banco de dados
   $servidor = 'localhost'; # Nome DNS ou IP do seu servidor HTTP
   $usuario = 'root';       # Nome de usuário para acesso ao MySQL
   $senha = 'vira';      # Senha de acesso
   $banco = 'bibtodomundo';   # Nome do banco de dados


   # Executa a conexão com o MySQL
   $link = new mysqli($servidor, $usuario, $senha);
   if ($link->connect_error) { die('Não foi possivel conectar: ' . $link->connect_error); }


  # Seleciona o banco de dados que deseja utilizar
  $select = mysqli_select_db($link,$banco);


  $home = 'http://localhost/biblio';
?>
