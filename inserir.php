<HTML lang='pt-br'>
<HEAD>
<LINK REL=StyleSheet HREF="bulma.css" TYPE="text/css">
</HEAD>
<body>

<?php
require_once("config.php");
require_once("verifica.php");
require_once("funcoes.php");
cabecalho();

// carregar as categorias no banco de dados
$consulta = "SELECT id, nome FROM `categorias`";
$result = mysqli_query($link,$consulta);
$opcoes = '<div class=select><select name="localizacao" value="'.$localizacao.'">';
while ($row = $result->fetch_assoc()) {
  $opcoes .= '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
}
$opcoes .='</select></div>';
$result->close();

echo '<section class="section">';
if (!isset($_SESSION['usuario'])) {
    echo 'Desculpe, voce nao esta autorizado a editar estas informacoes';
} else {
      if ($_REQUEST["acao"] == "editar") {
          echo '<h1 class="title has-text-centered">Alterar registro de livro</h1>';
          $buscacodigo = $_REQUEST['buscacodigo'];

          // Cria a expressï¿½o SQL de consulta ao registro a ser alterado

          $sql = "SELECT * FROM livros WHERE ID = $buscacodigo";

          // Realiza a busca pelos dados do registro

          $result = mysqli_query($link, $sql);

          // Valida se o registro existe no banco de dados

          if ($tbl = mysqli_fetch_array($result)) {

            // Armazena os dados para preencher no formulário a seguir

              $codigo = $tbl["ID"];
              $titulo = $tbl["titulo"];
              $subtitulo = $tbl["subtitulo"];
              $autor = $tbl["autor"];
              $editora = $tbl["editora"];
              $edicao = $tbl["edicao"];
              $ano = $tbl["ano"];
              $isbn = $tbl["isbn"];
              $paginas = $tbl["paginas"];
              $idioma = $tbl["idioma"];
              $palavraschave = $tbl["palavraschave"];
              $serie = $tbl["serie"];
              $nodeserie = $tbl["nodeserie"];
              $condicao = $tbl["condicao"];
              $avaliacao = $tbl["avaliacao"];
              $comentarios = $tbl["comentarios"];
              $datadecriacao = $tbl["datadecriacao"];
              $datademodificacao = $tbl["datademodificacao"];
              $origem = $tbl["origem"];
              $datadeentrada = $tbl["datadeentrada"];
              $local = $tbl["local"];
              $colaborador = $tbl["colaborador"];
              $localizacao = $tbl["localizacao"];
              $observacao = $tbl["observacao"];
              $classificacao = $tbl["classificacao"];
              $cutter = $tbl["cutter"];
          }
      } elseif ($_REQUEST["acao"] == "duplicar") {
          $buscacodigo = $_REQUEST['buscacodigo'];

          // Cria a expressï¿½o SQL de consulta ao registro a ser alterado

          $sql = "SELECT * FROM livros WHERE ID = $buscacodigo";

          // Realiza a busca pelos dados do registro

          $result = mysqli_query($link, $sql);

          // Valida se o registro existe no banco de dados

          if ($tbl = mysqli_fetch_array($result)) {

            // Armazena os dados para preencher no formulário a seguir
              // $codigo  = $tbl["ID"];

              $titulo = $tbl["titulo"];
              $subtitulo = $tbl["subtitulo"];
              $autor = $tbl["autor"];
              $editora = $tbl["editora"];
              $edicao = $tbl["edicao"];
              $ano = $tbl["ano"];
              $isbn = $tbl["isbn"];
              $paginas = $tbl["paginas"];
              $idioma = $tbl["idioma"];
              $palavraschave = $tbl["palavraschave"];
              $serie = $tbl["serie"];
              $nodeserie = $tbl["nodeserie"];
              $condicao = $tbl["condicao"];
              $avaliacao = $tbl["avaliacao"];
              $comentarios = $tbl["comentarios"];
              $datadecriacao = $tbl["datadecriacao"];
              $datademodificacao = $tbl["datademodificacao"];
              $origem = $tbl["origem"];
              $datadeentrada = decodificadata($tbl["datadeentrada"]);
              $local = $tbl["local"];
              $colaborador = $tbl["colaborador"];
              $localizacao = $tbl["localizacao"];
              $observacao = $tbl["observacao"];
              $classificacao = $tbl["classificacao"];
              $cutter = $tbl["cutter"];
          }
      }

      if (!isset($_SESSION['usuario'])) {
          die('<div class="notification is-warning">VocÃª nÃ£o estÃ¡ autorizado a acessar esta pÃ¡gina.');
      }

      echo '<h1 class="title has-text-centered">Registro de livro</h1>';
      if ($_REQUEST["acao"] == "editar") {
          $AcaoForm = "alterar";
      } elseif ($_REQUEST["acao"] == "duplicar") {
          $AcaoForm = "adicionar";
      } else {
          $AcaoForm = "adicionar";
      }


      echo '<form id="formulario" method="POST" action="gerencia-registro.php?acao='.$AcaoForm.'">';
      echo '<div class="columns"><div class="column">';
      if ($AcaoForm == "alterar") {
          echo '<div class="field"><label for="codigo">Código (auto)</label><INPUT type="text" name="codigo" value='.$codigo.'></div>';
      } ?>

   <div class="field"><label class="label" for="titulo">Título da Obra</label>
   <div class="control>"><input class="input" type="text" name="titulo" value="<?php echo $titulo; ?>" autofocus></div></div>

   <div class="field"><label class="label" for="subtitulo">Subtítulo</label>
  <div class="control>"><input class="input" type="text" name="subtitulo" value="<?php	echo $subtitulo; ?>"></div></div>


   <div class="field"><label class="label" for="autor">Autor</label><input class="input" type="text" name="autor" list="autores" value="<?php	echo $autor; ?>"></div>

   <div class="field"><label class="label" for="editora">Editora</label><input class="input" type="text" name="editora" list="editoras" value="<?php	echo $editora; ?>"></div>

   <div class="field"><label  class="label" for="edicao">Edição</label><input class="input" type="text" name="edicao" value="<?php echo $edicao; ?>"></div>

   <div class="field"><label class="label" for="ano">Ano</label><input class="input" type="text" name="ano" value="<?php echo $ano; ?>"></div>
</div>
<div class="column">
   <div class="field"><label class="label" for="isbn">ISBN</label><input class="input" type="text" name="isbn" value="<?php
    echo $isbn; ?>"></div>

   <div class="field"><label class="label" for="paginas">Páginas</label><input class="input" type="text" name="paginas" value="<?php
    echo $paginas; ?>"></div>

   <div class="field"><label class="label" for="idioma">Idiomas</label><input class="input" type="text" name="idioma" value="<?php
    echo $idioma; ?>"></div>

   <div class="field"><label class="label"  for="palavraschave">Palavras-chave</label><input class="input"  type="text" name="palavraschave" value="<?php
    echo $palavraschave; ?>"></div>

   <div class="field"><label class="label" class="label" for="serie">Série</label><input class="input" type="text" name="serie" value="<?php
    echo $serie; ?>"></div>

   <div class="field"><label class="label" for="nodeserie">Número na série</label><input class="input" type="text" name="nodeserie" value="<?php
    echo $nodeserie; ?>"></div>

</div>

<div class="column">
   <div class="field"><label class="label" for="condicao">Condição</label><input class="input" type="text" name="condicao" list="condicao" value="<?php
    echo $condicao; ?>"><datalist id="condicao"><option value="Novo"><option value="Usado"></datalist></div>

   <div class="field"><label class="label" for="comentarios">Comentários</label><input class="input" type="text" name="comentarios" value="<?php
    echo $comentarios; ?>"></div>

   <div class="field"><label class="label" for="origem">Origem</label><input class="input" type="text" list="origem" name="origem" value="<?php
    echo $origem; ?>"><datalist id="origem"><option value="Compra"><option value="Doação"></datalist></div>

   <div class="field"><label class="label" for="datadeentrada">Data de entrada</label><input class="input" type="date" name="datadeentrada" value="<?php
    echo $datadeentrada; ?>"></div>

   <div class="field"><label class="label" for="local">Local</label><input class="input" type="text" name="local" value="<?php
    echo $local; ?>"></div>

   <div class="field"><label class="label" for="colaborador">Colaborador</label><input class="input" type="text" name="colaborador" value="<?php
    echo $colaborador; ?>"></div>

</div>
<div class="column">
  <div class="field"><label class="label" for="localizacao">Localização</label>
    <?php echo $opcoes; ?>
  </div>

   <div class="field"><label class="label" for="observacao">Observação</label><input class="input" type="text" name="observacao" value="<?php
    echo $observacao; ?>"></div>

   <div class="field"><label class="label" for="classificacao">Classificação</label><input class="input" type="text" name="cutter" value="<?php
    echo $classificacao; ?>"></div>

   <div class="field"><label class="label" for="cutter">Cutter</label><input class="input" type="text" name="cutter" value="<?php
    echo $cutter; ?>"></div>

</div>
</div>
  <div class="columns">
  <div class="column"></div>
  <div class="column is-one-quarter">
  <div class="field">
  <input type="submit" value="Salvar" class="button is-primary is-fullwidth"></div>

  <div class="field">
  <input type="reset" value="Limpar todos os campos" class="button is-warning is-fullwidth"></div>
  </div><div class="column"></div></div>

  </form>
</section>


<!--
No formulário abaixo, falta incluir o arquivo php de destino dos dados. Criar o arquivo "incluir-em-lote.php" e nele fazer o carregamento dos dados do arquivo csv.
-->

<section class="section">
  <div class="columns is-centered">
    <div class="column is-half">
      <hr>
      <h2 class="title has-text-centered">Inserir em lote via arquivo</h2>
      <div class="content">
        <p>Baixe aqui o arquivo para incluir os livos. Após preenchido, salve novamente com a extensão <strong>.csv</strong>. Abaixo, selecione o arquivo com os dados salvos e faça o envio para agregá-lo ao banco de dados.</p>

        <form id="enviar">
          <div class="field is-grouped is-grouped-centered">

          <p class=control><input type="file" name="arquivo" accept="text/csv"></p>
          <p class=control><input type="submit" value="Enviar" class="button is-primary"></p>

        </form>
      </div>
    </div>
  </div>


</section>


<?php
  }
mysqli_close($link);

rodape(); ?>



</body>
</html>
