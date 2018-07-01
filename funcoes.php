<?php

function decodificadata($ymd) {
	list($ano, $mes, $dia) = explode('-', $ymd);
	$data = $dia;
	$data .= "/";
	$data .= $mes;
	$data .= "/";
	$data .= $ano;
	return $data;
}

function codificadata($ymd) {
	list($dia, $mes, $ano) = explode('/', $ymd);
	$data = $ano;
	$data .= "-";
	$data .= $mes;
	$data .= "-";
	$data .= $dia;
	return $data;
}

function botoesedicao($codigo) {
	if(isset($_SESSION['usuario'])) {
	echo '<A class="botaozinho" href="inserir.php?acao=editar&buscacodigo='.$codigo.'"><img src="imagens/editar.png" title="Editar registro"></A><A class="botaozinho" href="inserir.php?acao=duplicar&buscacodigo='.$codigo.'"><img src="imagens/duplicar.png" title="Duplicar registro"></A><A class="botaozinho" href="gerencia-registro.php?acao=excluir&buscacodigo='.$codigo.'"><img src="imagens/excluir.png" title="Excluir registro"></A>'; }
	}

function listaautores() {
	$sql = mysqli_query($link,"SELECT DISTINCT autor FROM livros");
	echo '<datalist id="autores">';
	while ($tbl = mysqli_fetch_array($sql)) {
		echo '<option>'.$tbl['autor'].'</option>';
	}
	echo '</datalist>';

	$sql2 = mysqli_query($link,"SELECT DISTINCT editora FROM livros");
	echo '<datalist id="editoras">';
	while ($tbl = mysqli_fetch_array($sql2)) {
		echo '<option>'.$tbl['editora'].'</option>';
	}
	echo '</datalist>';

	$sql3 = mysqli_query($link,"SELECT DISTINCT localizacao FROM livros");
	echo '<datalist id="localizacao">';
	while ($tbl = mysqli_fetch_array($sql3)) {
		echo '<option>'.$tbl['localizacao'].'</option>';
	}
	echo '</datalist>';

	$sql4 = mysqli_query($link,"SELECT DISTINCT condicao FROM livros");
	echo '<datalist id="condicao">';
	while ($tbl = mysqli_fetch_array($sql3)) {
		echo '<option>'.$tbl['condicao'].'</option>';
	}
	echo '</datalist>'; }

function rodape() {
  $footer = '<footer class="footer">
	  <div class="container">
	    <div class="content has-text-centered">
	      <p>
	        <small>Software <strong>Biblioteca de Todo Mundo</strong> desenvolvido por <a href="http://paulo.viraminas.org.br">Paulo Morais</a>.  O conteúdo deste site é publicado sob licença Creative Commons <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.</small>
	      </p>
	    </div>
	  </div>
	</footer>';
	echo $footer;
}

function cabecalho() {
  $header = '<section class="hero is-primary">
	<div class="columns">
	<div class="column is-offset-1">
	<div class="hero-body">
	<p class="title is-1">Biblioteca de Todo Mundo</p>
	<p class="subtitle is-4">Projeto de incentivo à leitura da Viraminas Associação Cultural</p>
	</div>
	';
	session_start();
	if(!isset($_SESSION['usuario'])) {
	$header .=	'<nav class="navbar is-primary is-centered" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
		<a class="navbar-item" href="index.php">Início</a></li>
		<a class="navbar-item" href="login.php">Entrar no sistema</a></li>
		</div>
	  </nav>'; }
	 else {
		 $header .=	'<nav class="navbar has-shadow is-spaced>
		 <div class="container">
		 <div class="navbar-brand">
		 <p class="navbar-item has-text-centered"><b>Bem-vindo, '.$_SESSION["nome"].'</b></p>
		 <a class="navbar-item has-text-centered" href="index.php">Início</a>
		 <a class="navbar-item has-text-centered" href="admin.php">Painel</a>
		 <a class="navbar-item has-text-centered" href="lista-leitores.php">Leitores</a>
		 <a class="navbar-item has-text-centered"  href="lista-emprestimo.php">Empréstimos</a>
		 <a class="navbar-item has-text-centered" href="inserir.php">Catalogar livro</a>
		 <a class="navbar-item has-text-centered" href="inserir-leitor.php">Cadastrar leitor</a>
		 <a class="navbar-item has-text-centered" href="index.php?acao=sair">Sair</a>
		 </div></div></nav>'; }

		$header .= '</div>
			</div>
			</section>';
		echo $header;
}
?>
