<HTML lang='pt-br'>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<LINK REL=StyleSheet HREF="styles.css" TYPE="text/css">
</HEAD>

 <?php header("Content-Type: text/html; charset=latin1",true);

  require_once("config.php");
  require_once("verifica.php");


  if(isset($_POST['busca'])) {
  $busca = $_POST['busca'];
  $escolha = $_POST['opcao'];
  $titulo = "Obras relacionadas com a busca: ";
  $titulo .= $busca;
  # Cria a express�o SQL de consulta aos registros
  $sql = "SELECT * FROM livros WHERE $escolha LIKE '%$busca%'";
  } else {
  # Cria a express�o SQL de consulta aos registros
  $sql = "SELECT * FROM livros";
  $titulo = "Acervo";
  }
  ?>




<div id="lista">
<img class="logo" src="imagens/cabecalho.png" align="center" />
<h3 align="center"><?php echo $titulo; ?></h3>

<?php
  # Exibe os resultados
  $result = mysqli_query($link,$sql);
  while ($tbl = mysqli_fetch_array($result))
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

    echo "<ul>";
    echo "<li>[".$codigo."] <a href=\"".$home."/fichalivro.php?id=".$codigo."\">$titulo</a></li>";
    echo "<li>$autor";
    echo "<li>$editora"; if(isset($ano)) echo ", $ano"; echo "</li>";
    echo "</ul>";

  }
?>
</div>

</HTML>
