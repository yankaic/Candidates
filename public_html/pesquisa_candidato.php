<html>
<body>


<h1 align = "center"> Candidatos </h1>
<hr>
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
$busca = $_POST["busca"];
$modo = $_POST["modo_pesquisa"];


include "conecta_mysql.inc";

$result= mysql_query("Select candidato.numero, candidato.nome, sigla, modalidade, descricao, imagem
		from candidato, partido where $modo like '%$busca%' and partido.numero=partido;");
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

}

mysql_close($con);
?>
</table>
<hr>
<p align = "center"> <a href="pesquisa_candidato.html"> Voltar </p>

</body>
</html>