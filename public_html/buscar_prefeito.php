<form method="post" action="fim.php">

<?php
$prefeito=$_POST["num_prefeito"];
$vereador=$_POST["num_vereador"];

echo "Código candidato<input type=\"text\" name=\"cod_prefeito\" value=\"$prefeito\" readonly=\"true\">";

?>



<table cellspacing = "3" align = "center" width="70%">
	<tr bgcolor = "#d6dddd">
		<th>Foto</th>
		<th>Numero</th>
		<th>Nome</th>
		<th>Partido</th>
		<th>Modalidade</th>
		<th>Descrição</th>
	</tr>
<?php

include "conexao.php";

$result= mysql_query("Select tb_candidato.numero, tb_candidato.nome, sigla, modalidade, descricao, imagem
		from tb_candidato, partido where tb_candidato.numero ='$prefeito' and partido.numero=partido;");
$num_linhas = mysql_num_rows($result);

for ($i=0;$i<$num_linhas;$i++){

$numero = mysql_result($result,$i,0);
$nome= mysql_result($result,$i,1);
$partido = mysql_result($result,$i,2);
$modalidade = mysql_result($result,$i,3);
$descricao = mysql_result($result,$i,4);
$imagem=mysql_result($result,$i,5);

echo "<tr><h1>" ;
echo "<td><img src=\"imagensCandidatos/$imagem\" width=\"150\" heigth=\"150\"> </td>";
echo "<td> <font face=\"arial\"><h3>$numero </td>";
echo "<td> <font face=\"arial\"><h3>$nome </td>";
echo "<td> <font face=\"arial\"><h3>$partido </td>";
echo "<td> <font face=\"arial\"><h3>$modalidade </td>";
echo "<td> <font face=\"arial\"><h3>$descricao </td>";
echo "</tr></h1>";
echo "<th>";
}

mysql_close($con);
?>
</table>
<br><hr>








<?php
	$vereador=$_POST["num_vereador"];
	echo "Código candidato<input type=\"text\" name=\"cod_vereador\" value=\"$vereador\" readonly=\"true\">";
?>


<table cellspacing = "3" align = "center" width="70%">
	<tr bgcolor = "#d6dddd">
		<th>Foto</th>
		<th>numero</th>
		<th>Nome</th>
		<th>Partido</th>
		<th>Modalidade</th>
		<th>Descrição</th>
	</tr>
<?php

$prefeito=$_POST["num_prefeito"];
$vereador=$_POST["num_vereador"];

include "conecta_mysql.inc";

$result= mysql_query("Select tb_candidato.numero, tb_candidato.nome, sigla, modalidade, descricao, imagem
		from tb_candidato, partido where tb_candidato.numero ='$vereador' and partido.numero=partido;");
$num_linhas = mysql_num_rows($result);

for ($i=0;$i<$num_linhas;$i++){

$numero = mysql_result($result,$i,0);
$nome= mysql_result($result,$i,1);
$partido = mysql_result($result,$i,2);
$modalidade = mysql_result($result,$i,3);
$descricao = mysql_result($result,$i,4);
$imagem=mysql_result($result,$i,5);

echo "<tr><h1>" ;
echo "<td><img src=\"imagensCandidatos/$imagem\" width=\"150\" heigth=\"150\"> </td>";
echo "<td> <font face=\"arial\"><h3>$numero </td>";
echo "<td> <font face=\"arial\"><h3>$nome </td>";
echo "<td> <font face=\"arial\"><h3>$partido </td>";
echo "<td> <font face=\"arial\"><h3>$modalidade </td>";
echo "<td> <font face=\"arial\"><h3>$descricao </td>";
echo "</tr></h1>";
echo "<th>";

}

mysql_close($con);
?>
</table><h1 align="center">

<input type="submit" value="Confirmar"> <a href=\"tela_de_voto.html\">Corrigir</a>
