<html lang='pt-br'>
<head>
  <title>Biblioteca de Todo Mundo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=latin1" />
  <link rel=StyleSheet href="bulma.css" type="text/css">
</head>
<body>

<?php

  require_once("config.php");
  require_once("funcoes.php");
  cabecalho();

  if (isset($_POST['busca'])) {
      $busca = $_POST['busca'];
      $escolha = $_POST['opcao'];
      $titulo = "Obras relacionadas com a busca: ";
      $titulo .= $busca;
      # Cria a expressão SQL de consulta aos registros
      $sql = "SELECT * FROM livros WHERE $escolha LIKE '%$busca%'";
  } else {
      # Cria a expressão SQL de consulta aos registros
      $sql = "SELECT * FROM livros";
  }
  echo '<section class="section">
  <div class="container">
  <h1 class="title">Acervo da biblioteca</h1>';

  # Exibe os resultados
  echo '<table class="table is-bordered">
    <thead>
      <tr>
        <th><abbr title="Código">Cód</abbr></th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>
        <th>Localização</th>
        <th>Situação</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th><abbr title="Código">Cód</abbr></th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>
        <th>Localização</th>
        <th>Situação</th>
      </tr>
    </tfoot><tbody>';

  $result = mysqli_query($link, $sql);
  while ($tbl = $result->fetch_array()) {
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

      $termo="SELECT * FROM emprestimos WHERE livro = '". $codigo ."' AND ativo = '1'";
      $consulta = mysqli_query($link,$termo);
      if( mysqli_num_rows($consulta) == 1 ) { $emprestado='<span class="tag is-warning is-small">Emprestado</span>'; } else {$emprestado='<span class="tag is-success is-small">Disponível</span>';}
      $consulta->close();

      $termo="SELECT cor,sigla FROM `categorias` WHERE id =".$localizacao;
      $consulta = mysqli_query($link, $termo);
      $row = $consulta->fetch_assoc();
      $sigla = '<span class="tag is-small" style="background:'.$row['cor'].';">'.$row['sigla'].'</span>';
      $consulta->close();
      echo '<tr>
            <th>'.$codigo.'</th>
            <td>'.$titulo.'</td>
            <td>'.$autor.'</td>
            <td>'.$editora.'</td>
            <td>'.$ano.'</td>
            <td>'.$sigla.'</td>
            <td>'.$emprestado.'</td>
          </tr>
          ';}
  $result->close();

  echo "</tbody></table></div></section>";
  rodape();
?>

</body>
</html>
