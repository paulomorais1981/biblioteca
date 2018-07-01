
<html>
<head>
<LINK REL=StyleSheet HREF="styles.css" TYPE="text/css">
</head>
<body>

<?php require_once("config.php");
  if($_REQUEST["acao"] == "sair"){
	session_start();
	session_destroy();
	}
	require_once("verifica.php"); ?>


<div id="conteudo">
<img src="imagens/cabecalho.png" />
<h3>Pesquisa no acervo.</h3>

	<form method="post" action="lista.php">
		<input type="text" name="busca" placeholder="Digite o que deseja encontrar..." />
		<select name="opcao">
		<option value="titulo">T&iacute;tulo</option>
		<option value="autor">Autor</option>
		<option value="palavraschave">Assunto</option>
		</selection>
		<input type="submit" value="Buscar" />
	</form>

<p><a href="<?php echo $home; ?>/lista.php">Lista de todos os livros</a></p>
</div>
</div>

</html>
