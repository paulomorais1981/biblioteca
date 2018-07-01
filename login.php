
<HTML>
<HEAD>
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
</HEAD>
<body>

<?php require_once("config.php");
  if($_REQUEST["action"] == "enviado")
  {
  $usuario=$_POST['usuario'];
  $password=$_POST['senha'];
  $senha=md5($password);
  $procura = mysqli_query($link,"SELECT * FROM admins WHERE login='$usuario' AND senha='$senha'");
	if (mysqli_num_rows($procura)!=0){
 	session_start();
	$_SESSION['usuario'] = $usuario;
	while ($dadosdousuario = mysqli_fetch_array($procura)) {$_SESSION['nome'] = $dadosdousuario['nome'];}
	header("location:index.php"); } else { header("location:login.php"); }
  }
  else

  { ?>
<div id="login">


<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
      <div class="column is-4 is-offset-4">
        <h3 class="title has-text-grey">Login</h3>
        <p class="subtitle has-text-grey">Faça login para continuar.</p>
        <div class="box">

          <form method="post" action="login.php?action=enviado">
            <div class="field">
              <div class="control">
                <input class="input is-large" type="text" placeholder="Nome de usuário" autofocus="" name="usuario">
              </div>
            </div>

            <div class="field">
              <div class="control">
                <input class="input is-large" type="password" placeholder="Sua senha" name="senha">
              </div>
            </div>
            <input type="submit" class="button is-block is-info is-large is-fullwidth" value="Entrar">
          </form><a class="button is-primary is-fullwidth is-primary is-large" href="<?php echo $home; ?>">Voltar</a>
        </div>


      </div>
    </div>
  </div>
</section>

<?php
  }
  mysqli_close($link);
?>


</body>
</html>
