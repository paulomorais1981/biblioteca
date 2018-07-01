
<HTML lang='pt-br'>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
<title>Biblioteca de Todo Mundo</title>
</HEAD>
<body>

  <?php
    require_once("config.php");
    require_once("funcoes.php");

    cabecalho();
    echo '<section class="section">
    <div class="container">
  	<h1 class="title">Leitores da Biblioteca</h1>
  <table class="table is-bordered">
    <thead>
      <tr class="is-dark">
        <th><abbr title="Código">Cód</abbr></th>
        <th>Leitor</th>
        <th>Telefone</th>
        <th>E-mail</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th><abbr title="Código">Cód</abbr></th>
        <th>Leitor</th>
        <th>Telefone</th>
        <th>E-mail</th>
      </tr>
    </tfoot>';
    if (isset($_POST["usuario"])){
      $usuario=$_POST["usuario"];
      $cons="SELECT * FROM usuarios WHERE nome LIKE '".$usuario."'";
      $consulta = mysqli_query($link,$cons);}
    else { $consulta = mysqli_query($link,"SELECT * FROM usuarios");}
  echo "<tbody>";
  while ($tbl = mysqli_fetch_array($consulta)) {
  $id=$tbl['ID'];
  echo '<tr>
        <th><a class="button is-small is-primary" href="fichaleitor.php?id='.$id.'">'.$tbl['ID'].'</a></th>
        <td>'.$tbl['nome']." ".$tbl['sobrenome'].'</td>
        <td>'.$tbl['telefone'].'</td>
        <td>'.$tbl['email'].'</td>
      </tr>

  ';
	}
  echo '</tbody></table>';
  msqli_close($link);
	?>

</div>
</section>

<?php footer(); ?>

</body>
