
<html>
<head>
<title>Biblioteca de Todo Mundo</title>
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
</head>
<body>

<?php
require_once("config.php");
if($_REQUEST["acao"] == "sair"){
	session_start();
	session_destroy();
	}
# require_once("verifica.php");
require_once("funcoes.php");
cabecalho();
?>

<div class="columns">
  <div class="column is-offset-1">
    <section class="section">
      <div class="box is-info">
        <h1 class="title has-text-centered">Pesquisa no acervo</h1>
	      <form method="post" action="lista.php">
          <div class="columns">
            <div class="column is-three-quarters">
              <input id="pesquisa" class="input is-fullwidth" type="text" name="busca" placeholder="Digite o termo aqui" autofocus>
            </div>
            <div class="column">
							<input type="submit" value="Buscar" class="button is-primary is-fullwidth">
            </div>
          </div>
          <div class="columns">
            <div class="column"><input id="termo1" class="is-checkradio" name="opcao" type="radio" value="titulo" checked><label for="termo1" class="radio">Título</label></div>
            <div class="column"><input class="is-checkradio" id="termo2" name="opcao" type="radio" value="autor"><label for="termo2" class="radio">Autor</label></div>
            <div class="column"><input class="is-checkradio" id="termo3" name="opcao" type="radio" value="palavraschave"><label for="termo3" class="radio">Assunto</label></div>
          </div>
          <!--<div class="field"> <a href="<?php echo $home; ?>/lista.php" class="button is-info is-fullwidth">Lista de todos os livros</a> </div>-->
        </form>
      </div>
    </section>
  </div>
<?php
if (isset($_SESSION['usuario'])) {
echo '<div class="column">
  <section class="section">
    <div class="box">
      <h1 class="title has-text-centered">Pesquisa por leitores</h1>
          <form method="post" action="lista-leitores.php">
            <div class="columns">
              <div class="column is-8"><input class="input is-fullwidth" name="usuario" type="text" placeholder="Nome do leitor..."></div>
              <div class="column"><input class="button is-primary is-fullwidth" value="Pesquisar" type="submit"></div>
            </div>
          </form>
      </div>
  </section>
</div>';


echo '<div class="column">
  <section class="section">
  <div class="box">
  <h1 class="title has-text-centered">Empréstimo rápido</h1>
  <form action="emprestimo.php" method="post">
  <div class="columns">
	<div class="column">
	<input class="input" name="livro" type="tel" placeholder="Cód. livro">
	</div>
  <div class="column"><input class="input" type="tel" name="leitor" placeholder="Cód. leitor" />
	</div>
  <div class="column">
	<input class="button is-primary is-fullwidth" type="submit" value="Gerar" />
	</div></div>
  </form>
  </div>
  </section>
  </div>'
;} else {
	echo '<div class=column></div>
	<div class=column></div>';
} ?>


</div>

<?php rodape(); ?>

</html>
