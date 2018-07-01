
<HTML lang='pt-br'>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
</HEAD>
<body>

  <?php
    require_once("config.php");
    require_once("verifica.php");
  ?>

  <section class="hero is-primary">
    <div class="hero-body">
      <p class="title">
        Biblioteca de Todo Mundo
      </p>
      <p class="subtitle">
        Projeto de incentivo à leitura da Viraminas Associação Cultural
      </p>
    </div>
  </section>

<section class="section">
<div class="container">

	<?php
	echo '<h1 class="title">Leitores da Biblioteca</h1>
  <ul class="lista-emprestimo">
  <li class="tabela-numero">C&oacuted</li><li class="tabela-nome">Leitor</li><li class="tabela-nome">e-mail</li><li class="tabela-numero"></li></ul>';
	$consulta = mysqli_query($link,"SELECT * FROM usuarios");
	while ($tbl = mysqli_fetch_array($consulta)) {
	echo '<ul><li class="tabela-numero">'.$tbl['ID'].'</li><li class="tabela-nome">'.$tbl['nome']." ".$tbl['sobrenome'].'<a class="botaozinho" href="inserir-leitor.php?acao=editar&buscacodigo='.$tbl['ID'].'"><img src="imagens/editar.png" title="Editar registro"></a></li><li class="tabela-nome">'.$tbl['email'].'</li></ul>';
	}
  msqli_close($link);
	?>


</div>

<footer class="footer">
  <div class="container">
    <div class="content has-text-centered">
      <p>
        <strong>Biblioteca de Todo Mundo</strong> por <a href="http://paulo.viraminas.org.rb">Paulo Morais</a>.  O conteúdo deste site é publicado sob licença Creative Commons <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
      </p>
    </div>
  </div>
</footer>



</body>
