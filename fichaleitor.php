<html lang='pt-br'>
<head>
<link rel=StyleSheet href="bulma.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
</head>
<body>

<?php
require_once("config.php");
require_once("verifica.php");
require_once("funcoes.php");

  if(!isset($_SESSION['usuario'])) { die('<div class="notification is-warning>Você não está autorizado a editar estas informações.</div>"');}

  $id = $_GET['id'];
  $pontos = 0;

  $historico = '<div class="column">
  <div class="box">
  <h4 class="subtitle is-4">Histórico</h4>
  <table class="table is-bordered">';
  $consulta = mysqli_query($link,"SELECT * FROM emprestimos WHERE usuario =".$id);
  while ($tabela = mysqli_fetch_array($consulta)) {
  $pontos=$pontos + 1;
  $pegalivro = mysqli_query($link,"SELECT * FROM livros  WHERE ID = ".$tabela['livro']);
  while ($tblivro = mysqli_fetch_array($pegalivro)) { $nomelivro = $tblivro['titulo']; }
  $historico.= '<tr><td>'.$nomelivro.'</td><td>'.$tabela['livro'].'</td></tr>';
  }
  $historico .= '</table></div></div>';
  $historico .= '<div class="column"></div></div></div></section>';

  # Cria a expressão SQL de consulta aos registros
  $cons="SELECT * FROM usuarios WHERE ID = '".$id."'";
  $sql = mysqli_query($link,$cons);
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  while ($tbl = mysqli_fetch_array($sql))
  {
  $nome  = $tbl['nome'];
	$telefone = $tbl['telefone'];
  $bairro = $tbl['bairro'];
  $endereco = $tbl['endereco'];
  $email = $tbl['email'];
  $nascimento=$tbl['nascimento'];
  $desde=$tbl['desde'];
  $cidade=$tbl['cidade'].' ('.$tbl['estado'].')';
  echo '<section class="section">';
  echo '<h1 class="title">'.$nome.'</h1>
  <div class="field is-grouped is-grouped-multiline">
  <div class="control"><div class="tags has-addons"><span class="tag is-small">código </span><span class="tag is-primary is-small">'.$id.'</span></div></div>
  <div class="control"><div class="tags has-addons"><span class="tag is-small">pontuação </span><span class="tag is-primary is-small">'.$pontos.'</span></div></div>
  <div class="control"><div class="tags has-addons"><span class="tag is-small">leitor desde </span><span class="tag is-primary is-small">'.date("d.M.Y",$desde).'</span></div></div>
  </div>
  <div class="columns">
  <div class="column">
  <div class="box">
  <h4 class="subtitle is-4">Dados pessoais    </h4>

  <table class="table is-bordered">
  <tr>
    <td>Endereço</td>
    <td>'.$endereco.'</td>
  </tr>
  <tr>
    <td>Bairro</td>
    <td>'.$bairro.'</td>
  </tr>
  <tr>
    <td>Cidade</td>
    <td>'.$cidade.'</td>
  </tr>
  <tr>
    <td>Telefone</td>
    <td>'.$telefone.'</td>
  </tr>
  <tr>
  </table>
  <a class="button is-small is-warning" href="inserir-leitor.php?acao=editar&buscacodigo='.$id.'">Editar</a>
  </div>
  </div>';
  }

  echo $historico;

mysqli_close();
?>
</body>
