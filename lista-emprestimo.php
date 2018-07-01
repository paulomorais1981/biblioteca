<html lang='pt-br'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<link rel=StyleSheet href="bulma.css" TYPE="text/css">
</head>
<body>

<?php
  require_once("config.php");
  require_once("verifica.php");
  require_once("funcoes.php");
  cabecalho();
  echo '<section class="section">';

	if(!isset($_SESSION['usuario'])) { die('Você não está autorizado a acessar esta página.');}

	## Calculando as datas
	$hoje = date("Y-m-d");
	list($ano, $mes, $dia) = explode('-', $hoje);
	$diafinal = $dia + 7;
	$devolver = mktime(0,0,0,$mes, $diafinal,$ano);
	$devolucao = date("Y-m-d", $devolver);
	## fim do cálculo

	if(isset($_POST['devolv'])){
	$devolv = "UPDATE emprestimos SET ativo = 0 WHERE livro = ";
	$devolv .= $_POST['devolv'];
	$sql = mysqli_query($link,$devolv);
  echo 'Devolução registrada com sucesso.';
	}

	if(isset($_POST['idlivro'])){
	$idlivro = $_POST['idlivro'];
	$idleitor = $_POST['idleitor'];
  $responsavel = $_SESSION['usuario'];
#	if $_POST['oquefazer'] = 'emprestar' {
		$sql = "INSERT INTO `emprestimos` (`ID`, `usuario`, `livro`, `retirada`, `devolucao`, `ativo`, `responsavel`) VALUES (NULL, '".$idleitor."', '".$idlivro."', '".$hoje."', '".$devolucao."', '1', '".$responsavel."');";
		$insere = mysqli_query($link,$sql) or die($sql." Nao deu.");
		echo '<div class="notification">Empréstimo gerado com sucesso.</div>';
#	} else {
#		$sql = "UPDATE emprestimos SET devolucao=".$devolver." WHERE usuario=".$idleitor." AND livro=".$idlivro." AND ativo=1";
#		$insere = mysql_query($sql) or die("Nao deu.");}
	}
	echo '<section class="section">
  <div class="container">
  <h1 class="title">Empréstimos ativos</h1>
  <table class="table is-bordered">
    <thead>
      <th><abbr title="Código">Cód</abbr></th>
      <th>Obra</th>
      <th>Leitor</th>
      <th>Retirada</th>
      <th>Devolução</th>
    </thead>
    <tfoot>
      <th><abbr title="Código">Cód</abbr></th>
      <th>Obra</th>
      <th>Leitor</th>
      <th>Retirada</th>
      <th>Devolução</th>
    </tfoot>
    <tbody>';
	$consulta = mysqli_query($link,"SELECT * FROM emprestimos WHERE ativo = 1");
	while ($tbl = mysqli_fetch_array($consulta)) {
	$pegalivro = mysqli_query($link,"SELECT * FROM livros  WHERE ID = ".$tbl['livro']);
	while ($tblivro = mysqli_fetch_array($pegalivro)) { $nomelivro = $tblivro['titulo']; }
	$pegaleitor = mysqli_query($link,"SELECT * FROM usuarios  WHERE ID = ".$tbl['usuario']);
	while ($tbleitor = mysqli_fetch_array($pegaleitor)) { $nomeleitor = $tbleitor['nome']." ".$tbleitor['sobrenome']; $email = $tbleitor['email'];}
	echo '<tr>
  <th>'.$tbl['ID'].'</th>
  <td>'.$nomelivro.' ('.$tbl['livro'].')</td>
  <td>'.$nomeleitor.' <a href=fichaleitor.php?id='.$tbl['usuario'].'>(info)</a></td>
  <td>'.decodificadata($tbl['retirada']).'</td>
  <td>'.decodificadata($tbl['devolucao']).'</td>
  <td><a class="button is-info" href="emprestimo.php?acao=devolver&idlivro='.$tbl['livro'].'">Encerrar</td>
  </tr>';

	$total = $total + 1;
	}
  echo '</tbody></table>';
  echo 'Total de empréstimos ativos: '.$total;

  mysqli_close($link);
  ?>


</div>
</body>
