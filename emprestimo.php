<html lang='pt-br'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<link rel=StyleSheet href="bulma.css" type="text/css">
</head>
<body>

<?php
require_once ("config.php");
require_once ("funcoes.php");
require_once ("verifica.php");
cabecalho();
if (!isset($_SESSION['usuario']))
  {
  echo 'Desculpe, voce não está autorizado a editar estas informações';
  }
  else
  {
  if ($_REQUEST['acao'] == 'devolver')
    {
    $livro = $_REQUEST['idlivro'];
  echo '<section class="section"><div class="box">
  <form action="lista-emprestimo.php" method="post">
	<input type="hidden" name="devolv" value="'.$livro.'">
	<p>Confirma a devolução do livro?</p>
	<input class="button is-info" type="submit" value="Confirmar">
	</form>
	<a class="button is-danger" href="lista-emprestimo.php">Cancelar</a>
  </div></section>';
    }
    else
    {
    $livro = $_POST['livro'];
    $leitor = $_POST['leitor'];
    echo '<section class="section">
    <div class="columns is-centered">
    <div class="columns is-third">
    <div class="box">
    <div class="content">
    <h2 class="title">Gerar novo empréstimo</h2>';
    $pegalivro = mysqli_query($link,"SELECT * FROM livros  WHERE ID = '$livro'");
    $pegaleitor = mysqli_query($link,"SELECT * FROM usuarios  WHERE ID = '$leitor'");
    while ($tblivro = mysqli_fetch_array($pegalivro))
      {
      echo '<p>Título da obra: ' . $tblivro['titulo'] . '</p>';
      }

    while ($tbleitor = mysqli_fetch_array($pegaleitor))
      {
      echo '<p>Nome do leitor: ' . $tbleitor['nome'] . " " . $tbleitor['sobrenome'] . '</p>';
      }
	    echo '<form action="lista-emprestimo.php" method="post">
	     <input type="hidden" name="idlivro" value="'.$livro.'">
	      <input type="hidden" name="idleitor" value="'.$leitor.'">
	      <p>Confirma o empréstimo do livro?</p>
	       <input type="submit" class="button is-info" value="Confirmar">
         <a class="button is-danger" href="index.php">Cancelar</a>
	      </form>
        </div>
        </div>
      </div>
      </div>
    </section>';
    }
  }
mysqli_close();

rodape();
?>

</div>
</body>
</html>
