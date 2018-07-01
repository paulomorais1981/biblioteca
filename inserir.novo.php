
<?PHP

require_once("config.php");
require_once("verifica.php");
require_once("funcoes.php");

if(!isset($_SESSION['usuario'])) {
	echo 'Desculpe, voce nao esta autorizado a editar estas informacoes';
	} else {
		if($_REQUEST["acao"] == "editar") {
		$buscacodigo = $_REQUEST['buscacodigo'];
		$sql = "SELECT * FROM livros WHERE ID = $buscacodigo";
		$result = mysql_query($sql);
			if($tbl = mysql_fetch_array($result)) {
				$codigo  = $tbl["ID"];
				$titulo   = $tbl["titulo"];
				$subtitulo = $tbl["subtitulo"];
				$autor   = $tbl["autor"];
				$editora = $tbl["editora"];
				$edicao  = $tbl["edicao"];
				$ano   = $tbl["ano"];
				$isbn   = $tbl["isbn"];
				$paginas = $tbl["paginas"];
				$idioma  = $tbl["idioma"];
				$palavraschave   = $tbl["palavraschave"];
				$serie   = $tbl["serie"];
				$nodeserie = $tbl["nodeserie"];
				$condicao  = $tbl["condicao"];
				$avaliacao   = $tbl["avaliacao"];
				$comentarios   = $tbl["comentarios"];
				$datadecriacao = $tbl["datadecriacao"];
				$datademodificacao = $tbl["datademodificacao"];
				$origem = $tbl["origem"];
				$datadeentrada = decodificadata($tbl["datadeentrada"]);
				$local = $tbl["local"];
				$colaborador = $tbl["colaborador"];
				$localizacao = $tbl["localizacao"];
				$observacao = $tbl["observacao"];
				$classificacao = $tbl["classificacao"];
				$cutter = $tbl["cutter"];} 
				}

			elseif($_REQUEST["acao"] == "duplicar") {
				$buscacodigo = $_REQUEST['buscacodigo'];
				$sql = "SELECT * FROM livros WHERE ID = $buscacodigo";
				$result = mysql_query($sql);
				if($tbl = mysql_fetch_array($result)) {
					$titulo   = $tbl["titulo"];
					$subtitulo = $tbl["subtitulo"];
					$autor   = $tbl["autor"];
					$editora = $tbl["editora"];
					$edicao  = $tbl["edicao"];
					$ano   = $tbl["ano"];
					$isbn   = $tbl["isbn"];
					$paginas = $tbl["paginas"];
					$idioma  = $tbl["idioma"];
					$palavraschave   = $tbl["palavraschave"];
					$serie   = $tbl["serie"];
					$nodeserie = $tbl["nodeserie"];
					$condicao  = $tbl["condicao"];
					$avaliacao   = $tbl["avaliacao"];
					$comentarios   = $tbl["comentarios"];
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

			else { echo "Registro não encontrado."; }
} ?>

<HTML lang='pt-br'>
<HEAD>
<LINK REL=StyleSheet HREF="styles.css" TYPE="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=latin1" /> 
</HEAD> 
<body>

<div id="lista-emprestimo">
<? 	
	echo '<img class="logo" src="imagens/cabecalho.png" />';
	if(!isset($_SESSION['usuario'])) { die('Voc&ecirc; n&atilde;o est&aacute autorizado a acessar esta p&aacute;gina.');}	
	echo '<h2>Registro de livro</h2>Preencha os campos abaixo:';
	if($_REQUEST["acao"] == "editar")
	{ $AcaoForm = "alterar"; }
	else
	{ $AcaoForm = "adicionar"; }
?>

  <FORM id="formulario" method="POST" action="gerencia-registro.php?acao=<? echo $AcaoForm; ?>">
  <? listaautores(); 
  if($AcaoForm = "alterar") { ?><label for="codigo">C&oacutedigo (auto)</label><INPUT type="text" name="codigo" value="<? echo $codigo; ?>"><? } ?><br>
  <label for="titulo">T&iacute;tulo da Obra</label><input type="text" name="titulo" value="<? echo $titulo; ?>">
  <br><label class="etiqueta" for="subtitulo">Subt&iacute;tulo</label><input type="text" name="subtitulo" value="<? echo $subtitulo; ?>">
  <br><label for="autor">Autor</label><input type="text" name="autor" list="autores" value="<? echo $autor; ?>">
  <br><label for="editora">Editora</label><input type="text" name="editora" list="editoras" value="<? echo $editora; ?>">
  <br><label for="edicao">Edi&ccedil;&atilde;o</label><input type="text" name="edicao" value="<? echo $edicao; ?>">
  <br><label for="ano">Ano</label><input type="text" name="ano" value="<? echo $ano; ?>">
  <br><label for="isbn">ISBN</label><input type="text" name="isbn" value="<? echo $isbn; ?>">
  <br><label for="paginas">P&aacute;ginas</label><input type="text" name="paginas" value="<? echo $paginas; ?>">
  <br><label for="idioma">Idiomas</label><input type="text" name="idioma" value="<? echo $idioma; ?>">
  <br><label for="palavraschave">Palavras-chave</label><input type="text" name="palavraschave" value="<? echo $palavraschave; ?>">
  <br><label for="serie">S&eacute;rie</label><input type="text" name="serie" value="<? echo $serie; ?>">
  <br><label for="nodeserie">N&uacute;mero na s&eacute;rie</label><input type="text" name="nodeserie" value="<? echo $nodeserie; ?>">
  <br><label for="condicao">Condi&ccedil;&atilde;o</label><input type="text" name="condicao" list="condicao" value="<? echo $condicao; ?>"><datalist id="condicao"><option value="Novo"><option value="Usado"></datalist>
  <br><label for="comentarios">Coment&aacute;rios</label><input type="text" name="comentarios" value="<? echo $comentarios; ?>">
  <br><label for="origem">Origem</label><input type="text" list="origem" name="origem" value="<? echo $origem; ?>"><datalist id="origem"><option value="Compra"><option value="Doa&ccedil;&atilde;o"></datalist>
  <br><label for="datadeentrada">Data de entrada</label><input type="text" autocomplete="off" placeholder="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" name="datadeentrada" value="<? echo $datadeentrada; ?>">
  <br><label for="local">Local</label><input type="text" name="local" value="<? echo $local; ?>">
  <br><label for="colaborador">Colaborador</label><input type="text" name="colaborador" value="<? echo $colaborador; ?>">
  <br><label for="localizacao">Localiza&ccedil;&atilde;o</label><input type="text" name="localizacao" list="localizacao" value="<? echo $localizacao; ?>">
  <br><label for="observacao">Observa&ccedil;&atilde;o</label><input type="text" name="observacao" value="<? echo $observacao; ?>">
  <br><label for="classificacao">Classifica&ccedil;&atilde;o</label><input type="text" name="cutter" value="<? echo $classificacao; ?>">
  <br><label for="cutter">Cutter</label><input type="text" name="cutter" value="<? echo $cutter; ?>">
  <br><div id="botoes-formulario"><INPUT type="reset" value="Limpar todos os campos">
<?
    if($_REQUEST["acao"] == "editar")
    { $NomeBotao = "Alterar registro"; }
    elseif($_REQUEST["acao"] == "duplicar")
    { $NomeBotao = "Duplicar registro"; }
    else
    { $NomeBotao = "Catalogar livro"; }
?>
<INPUT type="submit" value="<? echo $NomeBotao; ?>"></div>
  </FORM>

  </content>
 </BODY>
</HTML>

<? } ?>
