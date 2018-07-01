<html lang='pt-br'>
<head>
<LINK REL=StyleSheet HREF="styles.css" TYPE="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
</head>
<body>

<?php
  require_once("config.php");
  require_once("verifica.php");
  require_once("funcoes.php");

  echo '<section class="section">';
  $id = $_REQUEST['id'];
  # Cria a expressão SQL de consulta aos registros
  $sql = mysqli_query($link,"SELECT * FROM livros WHERE ID = '$id'");

  while ($tbl = mysqli_fetch_array($sql))
  {
      $codigo  = $tbl["ID"];
      $titulo   = $tbl["titulo"];
      $subtitulo = $tbl["subtitulo"];
      $autor   = $tbl["autor"];
      $editora = $tbl["editora"];
      $edicao  = $tbl["edicao"];
      $ano   = $tbl["ano"];
      $isbn   = $tbl["isbn"];
      $paginas = $tbl["paginas"];
      $idioma  = $tbl["idioma"];
      $palavraschave   = $tbl["palavraschave"];
      $serie   = $tbl["serie"];
      $nodeserie = $tbl["nodeserie"];
      $condicao  = $tbl["condicao"];
      $avaliacao   = $tbl["avaliacao"];
      $comentarios   = $tbl["comentarios"];
      $datadecriacao = $tbl["datadecriacao"];
      $datademodificacao = $tbl["datademodificacao"];
      $origem = $tbl["origem"];
      $datadeentrada = $tbl["datadeentrada"];
      $local = $tbl["local"];
      $colaborador = $tbl["colaborador"];
      $localizacao = $tbl["localizacao"];
      $observacao = $tbl["observacao"];
      $cutter = $tbl["cutter"];

    #Formatar abaixo conforme padrão do BULMA
    echo "<h2>$titulo";
    botoesedicao($codigo);
    echo "</h2>";
    echo "<ul>";
    if(isset($subtitulo)) echo "<li>$subtitulo";
    echo "<li class=\"infolivro\">$autor (ISBN: $isbn)";
    echo "<li class=\"palavraschave\">$palavraschave";
    echo "<li>$editora / $local "; if(isset($edicao)) echo "/ $edicao"; if(isset($ano)) echo "/ $ano";
    echo "<li>$paginas p&aacuteginas / idioma: $idioma";
    echo "<li>$serie";
    echo "<li>$nodeserie";
    echo "<li>Condi&ccedil&atildeo: $condicao";
    echo "<li>Origem: $origem";
    echo "<li>$colaborador";
    echo "<li>$localizacao";
    echo "<li>$cutter";
    echo "</ul>";
    }

	if(isset($_SESSION['usuario'])) {
  $termo="SELECT * FROM emprestimos WHERE livro = ". $id ." AND ativo = '1'";
	$consulta = mysqli_query($link,$termo);
	if( mysqli_num_rows($link,$consulta) == 1 ) { echo 'Emprestado'; } else {
    # Formatar abaixo conforme padrão do BULMA
    ?>


  <p>Gerar empréstimo</p>
	<form action="emprestimo.php" method="post">
	<input name="livro" type="hidden" value="<?php echo $codigo; ?>">
	<label for "leitor">Id do leitor<input type="number" name="leitor" /></label>
	<a href="lista-leitores.php" target="_blank"><img alt="Lista leitores" src="imagens/leitores.png" /></a>
	<input type="submit" value="Emprestar" />
	</form>
<?php }
	}

  mysqli_close($link);
  ?>


</section>
</body>
</html>
