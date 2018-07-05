<html lang='pt-br'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<title>Biblioteca de Todo Mundo</title>
<link rel=StyleSheet href="bulma.css" TYPE="text/css">
</head>
<body>

<?php
  require_once("config.php");
  require_once("funcoes.php");
  cabecalho();

  $consulta = "SELECT * FROM categorias";
  $result = mysqli_query($link,$consulta);
  $categorias = '<table class="table is-bordered">
  <thead><tr>
  <th><abbr title="Código">Cód</abbr></th>
  <th>Cor</th>
  <th>Categoria</th>
  <th>Sigla</th>
  <th>Ação</th>
  </tr></thead>';
  while ($row = $result->fetch_assoc()) {
    $categorias .= '<tr><td>'.$row['id'].'</td>
    <td style="background:'.$row['cor'].'; color:'.$row['cor'].';">'.$row['cor'].'</td>
    <td>'.$row['nome'].'</td>
    <td>'.$row['sigla'].'</td>
    <form action="categorias.php" method="post">
    <td><input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="'.$row['id'].'">
      <input class="button is-small" type="submit" value="Editar">
    </form></td></tr>';
  }
  $categorias .='</table>';
  $result->close();

  if(isset($_POST['nome'])) {
  $sql = "INSERT INTO `categorias` (`cor`, `nome`, `sigla`) VALUES ('".$_POST['cor']."','".$_POST['nome']."','".$_POST['sigla']."')";
  $sql2 = mysqli_query($link,$sql);

  }

  $consulta = "SELECT id, nome FROM `categorias`";
  $result = mysqli_query($link,$consulta);
  $opcoes = '<div class=select><select>';
  while ($row = $result->fetch_assoc()) {
    $opcoes .= '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
  }
  $opcoes .='</select></div>';
  $result->close();
  ?>

  <section class="section">
    <div class="columns">
      <div class="column is-5 is-offset-1">
        <div class="box">
          <h1 class="title is-3">Categorias</h1>
          <?php echo $categorias; ?>
        </div>
      </div>

      <div class="column is-2">
        <div class="box">
          <h1 class="title is-3">Nova categoria</h1>
            <form action="categorias.php" method="POST">
            <div class="field">
              <label class="label" for="cor">Cor</label>
              <div class="control">
                <input class="input" type="color" name="cor" required />
              </div>
            </div>
            <div class="field">
              <label class="label" for="nome">Nome</label>
              <div class="control">
                <input class="input" type="text" name="nome" required />
              </div>
            </div>
            <div class="field">
              <label class="label" for="sigla">Sigla</label>
            <div class="control">
              <input class="input" type="text" name="sigla" required />
            </div>
            </div>
            <input type="submit" class="button is-primary" value="Enviar">
            <form>
            <?php echo $sql; ?>
        </div>
      </div>
      <div class="column">
        <?php echo $opcoes; ?>
      </div>

    </div>
  </section>

<?php
  rodape();
  mysqli_close();
?>

</body>
</html>
