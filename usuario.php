<meta http-equiv="Content-Type" content="text/html; charset=iso-8859" />
<?

require_once("config.php");
require_once("verifica.php");

if($_POST['acao']=="mudasenha"){
	if($_POST['mudasenha1']==$_POST['mudasenha2']) {
		$sql = "UPDATE admins SET senha = '";
		$sql .= md5($_POST['novasenha1']);
		$sql .= "' WHERE login = '";
		$sql .= $_SESSION['usuario'];
		$sql .= "';";
		echo $sql; 
		$mudasenha = mysql($sql);
		header('Location: painel.php?mensagem=se');
	} else { header('Location: painel.php?mensagem=na'); }
}

else if($_POST['acao']=="criaadmin"){
	$sql = "INSERT INTO admins (login, senha, nome) VALUES ('";
	$sql .= $_POST['login'];
	$sql .= "', '";
	$sql .= md5($_POST['senha']);
	$sql .= "', '";
	$sql .= $_POST['nome'];
	$sql .= "');";
	$criausuario = mysql_query($sql) or die('N&atilde;o foi poss&iacute;vel criar usu&aacute;rio');
	header('Location: painel.php?mensagem=ok');
}
?>
