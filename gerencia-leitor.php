<html lang='pt-br'>
<head>
  <link rel=StyleSheet href="bulma.css" type="text/css">
</head>
<body>


<?php

  require_once("config.php");
  require_once("verifica.php");
  require_once("funcoes.php");
  cabecalho();

      $codigo   = $_POST["codigo"];
      $nome   = $_POST["nome"];
      $endereco   = $_POST["endereco"];
      $bairro = $_POST["bairro"];
      $cep  = $_POST["cep"];
      $cidade   = $_POST["cidade"];
      $estado   = $_POST["estado"];
      $telefone = $_POST["telefone"];
      $email   = $_POST["email"];
      $nascimento   = $_POST["nascimento"];
      $desde = $_POST["desde"];

  # Verifica se o arquivo foi chamado a partir de um formulário
  if($_GET["acao"] == "adicionar")
  {
    # Cria a expressão SQL de inserção
    $sql = "INSERT INTO usuarios (nome, endereco, bairro, cep, cidade, estado, telefone, email, nascimento, desde) VALUES (";
    $sql .= "'$nome', ";
    $sql .= "'$endereco', ";
    $sql .= "'$bairro', ";
    $sql .= "'$cep', ";
    $sql .= "'$cidade', ";
    $sql .= "'$estado', ";
    $sql .= "'$telefone', ";
    $sql .= "'$email', ";
    $sql .= "'$nascimento', ";
    $sql .= "'$desde'";
    $sql .= ")";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);

    # Verifica o sucesso da operação
    #if (!$result)
    # { echo $sql; die('Erro: '.mysqli_error()); }

    # Se a operação foi realizada com sucesso, informa na tela
  echo '<section class="section">
      <div class="notification is-sucess">
      A operação foi realizada com sucesso.
      </div>
      </section>'; }

  else if($_REQUEST["acao"] == "alterar")
  {
    # Cria a expressão SQL de alteração
    $sql = "UPDATE usuarios SET ";
    $sql .= "nome = '$nome', ";
    $sql .= "endereco = '$endereco', ";
    $sql .= "bairro = '$bairro', ";
    $sql .= "cep = '$cep', ";
    $sql .= "cidade = '$cidade', ";
    $sql .= "estado = '$estado', ";
    $sql .= "telefone = '$telefone', ";
    $sql .= "email = '$email', ";
    $sql .= "nascimento = '$nascimento', ";
    $sql .= "desde = '$desde'";
    $sql .= " WHERE ID = '$codigo'";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);

    # Verifica o sucesso da operação
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    # Se a operação foi realizada com sucesso, informa na tela
    else
    { echo '<section class="section">
          <div class="notification is-sucess">
          A operação foi realizada com sucesso.
          </div>
          </section>'; }
  }
  else if($_REQUEST["acao"] == "excluir")
  {
    # Cria a expressão SQL de exclus�o
    $sql = "DELETE FROM usuarios WHERE ID = $codigo";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);

    # Verifica o sucesso da opera��o
    if (!$result)
    { die('Erro: '.mysqli_error()); }

    # Se a operação foi realizada com sucesso, informa na tela
    else
    { echo '<section class="section">
          <div class="notification is-sucess">
          A operação foi realizada com sucesso.
          </div>
          </section>'; }
  }

  mysqli_close($link);
  echo '</section>';
  rodape();
?>

</body>
</html>
