

 <?PHP header("Content-Type: text/html; charset=latin1",true);

  require_once("config.php");
  require_once("verifica.php");

  # Cria a expressão SQL de consulta aos registros
  $sql = "SELECT * FROM livros";
?>
<HTML lang='pt-br'>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" /> 
<LINK REL=StyleSheet HREF="styles.css" TYPE="text/css">
</HEAD>
<h1>Biblioteca de Todo Mundo</h1>
<h3>Acervo</h3>
<?
  # Exibe os resultados 
  $result = mysql_query($sql);
  while ($tbl = mysql_fetch_array($result)) 
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
      $cutter = $tbl["cutter"]; ?>

	<div id="livro"> <?php

    echo "<h2>$titulo</h2>";
    echo "<ul>";
    if(isset($subtitulo)) echo "<li>$subtitulo";
    echo "<li class=\"infolivro\">$autor (ISBN: $isbn)</p>";
    echo "<li class=\"palavraschave\">$palavraschave";
    echo "<li>$editora / $local "; if(isset($edicao)) echo "/ $edicao"; if(isset($ano)) echo "/ $ano";
    echo "<li>$paginas páginas / idioma: $idioma";
    echo "<li>$serie";
    echo "<li>$nodeserie";
    echo "<li>Condição: $condicao";
    echo "<li>Origem: $origem";
    echo "<li>$colaborador";
    echo "<li>$localizacao";
    echo "<li>$cutter";
    echo "</ul>";
    if(isset($_SESSION['usuario'])) {
    echo "<A class=\"linkbotao\" href=\"inserir.php?acao=editar&buscacodigo=$Codigo\">";
    echo "(Editar)</A>";
    echo "<A class=\"linkbotao\" href=\"gerencia-registro.php?acao=excluir&buscacodigo=$Codigo\">";
    echo "(Excluir)</A>";}

?></div><?php
  }
?>

  <BR><A href="inserir.php">Clique aqui para inserir um novo registro.</A>
</HTML>
