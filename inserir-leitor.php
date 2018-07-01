<html lang='pt-br'>
<head>
<link REL=StyleSheet HREF="bulma.css" TYPE="text/css">
<title>Biblioteca de Todo Mundo</title>
</head>
<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeypress = function(){
		mascara( this, mtel );
	}
}
</script>
<body>
<?php

  require_once("config.php");
  require_once("verifica.php");
  require_once("funcoes.php");
  cabecalho();

  echo '<section class="section">';

  # Inclui a data de hoje na variável
  $desde = mktime();

  if(!isset($_SESSION['usuario'])) {
	echo 'Desculpe, voce nao esta autorizado a editar estas informacoes';
	}

  if($_REQUEST["acao"] == "editar")
  {
   $div = '<h1 class="title has-text-centered">Alterar registro de leitor</h1>';
    $buscacodigo = $_REQUEST['buscacodigo'];
    # Cria a express�o SQL de consulta ao registro a ser alterado
    $sql = "SELECT * FROM usuarios WHERE ID = $buscacodigo";

    # Realiza a busca pelos dados do registro
    $result = mysqli_query($link, $sql);

    # Valida se o registro existe no banco de dados
    if($tbl = mysqli_fetch_array($result))
    {
     # Armazena os dados para preencher no formulário a seguir
      $codigo  = $tbl["ID"];
      $nome   = $tbl["nome"];
      $endereco   = $tbl["endereco"];
      $bairro = $tbl["bairro"];
      $cep  = $tbl["cep"];
      $cidade   = $tbl["cidade"];
      $estado   = $tbl["estado"];
      $telefone = $tbl["telefone"];
      $email   = $tbl["email"];
      $nascimento = $tbl["nascimento"];
      $desde = $tbl["desde"];
    }

    # Exibe mensagem de erro se n�o existir
    else
    { echo "Registro não encontrado."; }
  }
  else { $div = '<h1 class="title has-text-centered">Inserir novo leitor</h1>'; }
  echo $div;
    if($_REQUEST["acao"] == "editar")
    { $AcaoForm = "alterar"; }
    else
    { $AcaoForm = "adicionar";
	$cidade="Três Corações";
	$estado="MG";
	$cep="37410000"; }

  echo '<form id="formulario" method="POST" action="gerencia-leitor.php?acao='.$AcaoForm.'">';
  echo '<div class="columns is-centered"><div class="column is-one-quarter">';


  if($AcaoForm = "alterar") { ?>


    <div class="field"><label class="label" for="codigo">Código (automático)</label>
    <div class="control>"><input class="input" type="text" name="codigo" value="<?php echo $codigo; ?>" readonly></div></div>

    <div class="field"><label class="label" for="nome">Nome Completo</label><div class="control>"><input class="input" type="text" name="nome" value="<?php	echo $nome; ?>" autofocus></div></div>

    <div class="field"><label class="label" for="endereco">Endereço</label><div class="control>"><input class="input" type="text" name="endereco" value="<?php	echo $endereco; ?>"></div></div>

    <div class="field"><label class="label" for="bairro">Bairro</label><div class="control>"><input class="input" type="text" name="bairro" value="<?php	echo $bairro; ?>"></div></div>

    <div class="field"><label class="label" for="cep">CEP</label><div class="control>"><input class="input" id="cep" type="text" name="cep" value="<?php	echo $cep; ?>"></div></div>

  </div><div class="column is-one-quarter">

    <div class="field"><label class="label" for="cidade">Cidade</label><div class="control>"><input class="input" type="text" name="cidade" value="<?php	echo $cidade; ?>"></div></div>

    <div class="field"><label class="label" for="estado">Nome</label><div class="control>"><input class="input" type="text" name="estado" value="<?php	echo $estado; ?>"></div></div>

    <div class="field"><label class="label" for="telefone">Telefone</label><div class="control>"><input class="input" type="tel" name="telefone" id="telefone" maxlength="15" value="<?php	echo $telefone; ?>"></div></div>

    <div class="field"><label class="label" for="email">Email</label><div class="control>"><input class="input" type="text" name="email" value="<?php	echo $email; ?>"></div></div>

    <div class="field"><label class="label" for="nascimento">Data de nascimento</label><div class="control>"><input class="input" type="date" name="nascimento" value="<?php	echo $nascimento ; ?>"></div></div>

    <input type=hidden name="desde" value="<?php echo $desde ?>">


  </div>
  </div>

  <div class="columns is-centered">
  <div class="column is-one-quarter">
    <div class="field">
    <input type="submit" value="Salvar" class="button is-primary is-fullwidth"></div>

    <div class="field">
    <input type="reset" value="Limpar todos os campos" class="button is-warning is-fullwidth"></div>
  </div>
  </div>

  </div>
    </form>
<?php
  }
mysqli_close($link);

rodape(); ?>

 </body>
</html>
