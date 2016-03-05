<html>
<body>
<h1 align="center">Atualizar Candidato</h1>
<hr>

<?php
$numero_candidato = $_POST["num_candidato"];
include "conexao.php";

$result=mysql_query("SELECT * FROM tb_candidato WHERE numero= $numero_candidato");
$num_linhas=mysql_num_rows($result);

if($num_linhas!=0)
{
	$numero = mysql_result($result,0,0);
	$nome = mysql_result($result,0,1);
	$partido = mysql_result($result,0,2);
	$modalidade = mysql_result($result,0,4);
	$descricao = mysql_result($result,0,7);
    
	
	
	echo "<form method=\"POST\" action=\"atualiza_candidato.php\">";
	echo "<p>Numero <input type=\"text\" name=\"numero\" value=\"$numero\" readonly=\"true\"></p>";
	echo "<p>Nome <input type=\"text\" name=\"nome\" value=\"$nome\"></p>";
	echo "<p>Partido <input type=\"text\" name=\"partido\" value=\"$partido\"></p>";
    echo "<p>Descricao <input type=\"text\" name=\"descricao\" value=\"$descricao\"></p>";

	mysql_close($con);

	echo "<input type=\"submit\" value=\"Atualizar\">";
	echo "</form>";
}
else
	echo "<p>Candidato nao encontrado!";

echo "<hr>";
echo "<p align=\"center\"><a href=\"atualiza_candidato.html\">Voltar</p>";
echo "</body>";
echo "</html>";
?>
