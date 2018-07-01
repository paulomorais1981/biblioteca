<html lang='pt-br'>
<head>
<link REL=StyleSheet HREF="bulma.css" TYPE="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
</HEAD>
<body>
  <?php
  require_once("config.php");
  require_once("verifica.php");
  require_once("funcoes.php");

  echo '<div id="conteudo">';
  $acao = $_GET['acao'];
  $titulo = $_POST['titulo'];
  $subtitulo = $_POST['subtitulo'];
  $autor = $_POST['autor'];
  $editora = $_POST['editora'];
  $edicao = $_POST['edicao'];
  $ano = $_POST['ano'];
  $isbn = $_POST['isbn'];
  $paginas = $_POST['paginas'];
  $idioma = $_POST['idioma'];
  $palavraschave = $_POST['palavraschave'];
  $serie = $_POST['serie'];
  $nodeserie = $_POST['nodeserie'];
  $condicao = $_POST['condicao'];
  $avaliacao = $_POST['avaliacao'];
  $comentarios = $_POST['comentarios'];
  $datadecriacao = $_POST['datadecriacao'];
  $datademodificacao = $_POST['datademodificacao'];
  $origem = $_POST['origem'];
  $datadeentrada = $_POST['datadeentrada'];
  $local = $_POST['local'];
  $colaborador = $_POST['colaborador'];
  $localizacao = $_POST['localizacao'];
  $observacao = $_POST['observacao'];
  $cutter = $_POST['cutter'];
  $codigo = $_POST['codigo'];

  # Verifica se o arquivo foi chamado a partir de um formulário
  if($acao == "adicionar") {

#    # Cria a expressão SQL de inserção
    $sql = "INSERT INTO livros (titulo, subtitulo, autor, editora, ano, isbn, paginas, idioma, palavraschave, serie, nodeserie, condicao, comentarios, origem, datadeentrada, local, colaborador, localizacao, observacao, cutter) VALUES (";
    $sql .= "'$titulo', ";
    $sql .= "'$subtitulo', ";
    $sql .= "'$autor', ";
    $sql .= "'$editora', ";
    $sql .= "'$ano', ";
    $sql .= "'$isbn', ";
    $sql .= "'$paginas', ";
    $sql .= "'$idioma', ";
    $sql .= "'$palavraschave', ";
    $sql .= "'$serie', ";
    $sql .= "'$nodeserie', ";
    $sql .= "'$condicao', ";
    $sql .= "'$comentarios', ";
    $sql .= "'$origem', ";
    $sql .= "'$dadadeentrada', ";
    $sql .= "'$local', ";
    $sql .= "'$colaborador', ";
    $sql .= "'$localizacao', ";
    $sql .= "'$observacao', ";
    $sql .= "'$cutter'";
    $sql .= ")";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);
    # Verifica o sucesso da operação
    if (!$result)
    { die($sql.'<br>Erro: '.mysqli_error()); }

    # Se a operação foi realizada com sucesso, informa na tela
    else
    { echo 'A operação foi realizada com sucesso.'; }
  }
  else if($acao == "alterar")
  {
    # Cria a expressão SQL de alteração
    $sql = "UPDATE livros SET ";
    $sql .= "titulo = '$titulo', ";
    $sql .= "subtitulo = '$subtitulo', ";
    $sql .= "autor = '$autor', ";
    $sql .= "editora = '$editora', ";
    $sql .= "edicao = '$edicao', ";
    $sql .= "ano = '$ano', ";
    $sql .= "isbn = '$isbn', ";
    $sql .= "paginas = '$paginas', ";
    $sql .= "idioma = '$idioma', ";
    $sql .= "palavraschave = '$palavraschave', ";
    $sql .= "serie = '$serie', ";
    $sql .= "nodeserie = '$nodeserie', ";
    $sql .= "condicao = '$condicao', ";
    $sql .= "comentarios = '$comentarios', ";
    $sql .= "origem = '$origem', ";
    $sql .= "datadeentrada = '$datadeentrada', ";
    $sql .= "local = '$local', ";
    $sql .= "colaborador = '$colaborador', ";
    $sql .= "localizacao = '$localizacao', ";
    $sql .= "observacao = '$observacao', ";
    $sql .= "cutter = '$cutter'";
    $sql .= " WHERE ID = '$codigo'";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);

    # Verifica o sucesso da operação
    if (!$result)
    { die('Erro: '.mysqli_error()); }

    # Se a operação foi realizada com sucesso, informa na tela
    else
    { echo 'A operação foi realizada com sucesso.'; }
  }
  else if($acao == "excluir")
  {
    # Cria a expressão SQL de exclusão
    $codigo = $_GET['buscacodigo'];
    $sql = "DELETE FROM livros WHERE ID = $codigo";

    # Executa a expressão SQL no servidor, e armazena o resultado
    $result = mysqli_query($link,$sql);

    # Verifica o sucesso da operação
    if (!$result)
    { die('Erro: '.mysqli_error()); }

    # Se a operação foi realizada com sucesso, informa na tela
    else
    { echo 'A operação foi realizada com sucesso.'; }

  }

  mysqli_close($link);
?>
</div>
</body>
