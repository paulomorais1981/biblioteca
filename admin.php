<!DOCTYPE html>
<html>
<head>
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
<title>Biblioteca de Todo Mundo</title>
</head>
<body>

<?php
require_once("config.php");
require_once("funcoes.php");
cabecalho();

$consulta = "SELECT COUNT(titulo) AS contagem FROM livros";
$result = mysqli_query($link,$consulta);
$row = $result->fetch_assoc();
$livros = $row['contagem']." livros no acervo.";
$result->close();

$consulta = "SELECT COUNT(nome) AS contagem FROM usuarios";
$result = mysqli_query($link,$consulta);
$row = $result->fetch_assoc();
$livros .= '<br>'.$row['contagem']." leitores cadastrados.";
$result->close();

$consulta = "SELECT COUNT(ativo) AS contagem FROM emprestimos";
$result = mysqli_query($link,$consulta);
$row = $result->fetch_assoc();
$livros .= '<br>'.$row['contagem']." empréstimos ativos.";
$result->close();

$sql  = 'SELECT COUNT(*) as repeticoes, livro FROM `emprestimos` GROUP BY livro ORDER BY repeticoes LIMIT 0,10';
$result = mysqli_query($link,$sql);
$maislidos = '<table class="table is-bordered">
<thead><tr>
<th><abbr title="Código">Cód</abbr></th>
<th>Título</th>
<th>Empréstimos</th>
</tr></thead>
<tfoot><tr>
<th><abbr title="Código">Cód</abbr></th>
<th>Título</th>
<th>Empréstimos</th>
</tr></tfoot>';
$row = $result->fetch_assoc();
$sql2 = 'SELECT `titulo` FROM `livros` WHERE id ='.$row['livro'];
$resultado = mysqli_query($link,$sql2);
$coluna = $resultado->fetch_assoc();
$titulo = $coluna['titulo'];
$resultado->close();
$maislidos .= '<tr>
<td>'.$row['livro'].'</td>
<td>'.$titulo.'</td>
<td>'.$row['repeticoes'].'</td>
</tr>';
$result->close();
$maislidos.='</table>';

$sql  = 'SELECT COUNT(*) as repeticoes, usuario FROM `emprestimos` GROUP BY usuario ORDER BY repeticoes LIMIT 0,10';
$result = mysqli_query($link,$sql);
$maisassiduos = '<table class="table is-bordered">
<thead><tr>
<th><abbr title="Código">Cód</abbr></th>
<th>Leitor</th>
<th>Empréstimos</th>
</tr></thead>
<tfoot><tr>
<th><abbr title="Código">Cód</abbr></th>
<th>Leitor</th>
<th>Empréstimos</th>
</tr></tfoot>';
$row = $result->fetch_assoc();
$sql2 = 'SELECT `nome` FROM `usuarios` WHERE id ='.$row['usuario'];
$resultado = mysqli_query($link,$sql2);
$coluna = $resultado->fetch_assoc();
$nome = $coluna['nome'];
$resultado->close();
$maisassiduos .= '<tr>
<td>'.$row['usuario'].'</td>
<td>'.$nome.'</td>
<td>'.$row['repeticoes'].'</td>
</tr>';
$result->close();
$maisassiduos.='</table>';
 ?>

<section class="section">
  <div class="columns">
    <div class="column is-offset-1">
      <div class="box">
        <p class="title is-4">Estatísticas do sistema</p>
        <?php echo $livros; ?>
      </div>
    </div>
    <div class="column">
      <div class="box">
        <p class="title is-4">Mais lidos</p>
        <?php echo $maislidos; ?>
      </div>
    </div>
    <div class="column">
      <div class="box">
        <p class="title is-4">Mais assíduos</p>
        <?php echo $maisassiduos; ?>
      </div>
    </div>
  </div>
</section>

<?php rodape(); ?>

</body>
</html>
