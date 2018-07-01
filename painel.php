<html>
<head>
	<title>Painel - Biblioteca de Todo Mundo</title>
	<link rel=StyleSheet href="bulma.css" TYPE="text/css">
</head>
<body>

<?php 	require_once("config.php");
	require_once("funcoes.php");

	if(!isset($_SESSION['usuario'])) { die('Você não está autorizado a acessar esta parte do sistema.');} else {

	if($_POST['acao']=="mudasenha"){
	if($_POST['novasenha1']==$_POST['novasenha2']) {
		$sql = "UPDATE admins SET senha = '";
		$sql .= md5($_POST['novasenha1']);
		$sql .= "' WHERE login = '";
		$sql .= $_SESSION['usuario'];
		$sql .= "';";
		echo $sql;
		$mudasenha = mysqli_query($link,$sql);
		$mensagem = 1;
	} else { $mensagem = 2; }
	}

	else if($_POST['acao']=="criaadmin"){
	$sql = "INSERT INTO admins (login, senha, nome) VALUES ('";
	$sql .= $_POST['login'];
	$sql .= "', '";
	$sql .= md5($_POST['senha']);
	$sql .= "', '";
	$sql .= $_POST['nome'];
	$sql .= "');";
	$criausuario = mysqli_query($link,$sql) or die('Não foi possível criar o usuário');
	$mensagem = 1;
	}

	else {$mensagem = 4;}
	echo '<div id="painel">';
	if($mensagem==0) { echo '<div id="alerta">Erro na operação.</div>'; }
	else if($mensagem==1) { echo '<div id="alerta">Operação realizada com sucesso.</div>';}
	else if($mensagem==2) { echo '<div id="alerta">Senhas não conferem.</div>';}

	 ?>



	<div class="painelmensagem">
		<h3>Estatísticas do sistema</h3>
		<?php
		echo 'parou aqui';
		$consulta="SELECT COUNT(*) FROM livros";
		echo $consulta;
		$sql = mysqli_query($link,$consulta);
		if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		else{
		echo 'Livros catalogados: ';}

		echo '<p>Livros mais requisitados:</p>';
		echo '<ol>';
		$sql2 = mysqli_query("select livro, count(livro) from emprestimos group by livro order by count(livro) desc limit 10");

		while ($maislidos = mysqli_fetch_array($link,$sql2)) {
			$consulta="SELECT titulo FROM livros WHERE ID = ".$maislidos['livro'];
			$nomedolivro = mysqli_query($link,$consulta) or die ("Fudeu");
			$nomedolivro2 = mysql_fetch_assoc($nomedolivro);
			echo '<li>['.$maislidos['livro'].'] '.$nomedolivro2['titulo'].'</li>'; }
		echo '</ol>';
		echo '</div>';

 		$sql = "SELECT * FROM `mensagens` ORDER BY ID DESC LIMIT 3";
		$result = mysql_query($sql);
		while($tbl=mysql_fetch_array($result)){
			echo '<ul class="mensageiro">';
			echo '<li class="conteudomensagem">'.$tbl['mensagem'].'</li>';
			echo '<li class="remetente">enviado por '.$tbl['autor'].' em ';
			echo $tbl['data'];
			echo '</li></ul>';
		}

		?>

	</div>
	<ul>
		<li><a href="index.php">In&iacute;cio</a></li>
		<li><a href="lista-leitores.php">Leitores</a></li>
		<li><a href="lista-emprestimo.php">Empr&eacute;stimos</a></li>
		<li><a href="inserir.php">Catalogar livro</a></li>
		<li><a href="inserir-leitor.php">Cadastrar leitor</a></li>
		<li><a href="index.php?acao=sair">Sair</a></li>
	</ul> -->

	<form method="post" action="painel.php">
		<h3>Mudar minha senha</h3>
		<input type=hidden name=acao value="mudasenha">
		<input type="password" name="atual" placeholder="Senha atual">
		<input type="password" name="novasenha1" placeholder="Digite a nova senha">
		<input type="password" name="novasenha2" placeholder="Redigite a nova senha">
		<input type="submit" value="Mudar senha">
	</form>


	<form method="post" action="painel.php">
		<h3>Criar novo usu&aacute;rio administrador</h3>
		<input type=hidden name=acao value="criaadmin">
		<input type="text" name="login" placeholder="Digite o login do novo usu&aacute;rio">
		<input type="text" name="senha" placeholder="Digite a senha do usu&aacute;rio">
		<input type="text" name="nome" placeholder="Digite o nome completo">
		<input type="submit" value="Criar usu&aacute;rio">
	</form> <?php } ?>


</div>
</body>
</html>
