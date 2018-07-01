<?

require_once("config.php");

$sql = "INSERT INTO admins (login, senha, nome) VALUES ('";
$sql .= $_POST['login'];
$sql .= "', '";
$sql .= md5($_POST['senha']);
$sql .= "', '";
$sql .= $_POST['nome'];
$sql .= "');";

echo $sql.'<br>';

$criausuario = mysql_query($sql) or die('N&atilde;o foi poss&iacute;vel criar usu&aacute;rio');


header('Location: painel.php?mensagem=ok');

?>
