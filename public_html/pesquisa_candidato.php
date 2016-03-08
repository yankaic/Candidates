<html>
    <head>
        <title>
            Candidatos - Busca
        </title>
        <meta charset="UTF-8">
    </head>
    
<body>


<h1 align = "center"> Candidatos </h1>
<hr>
<table cellspacing = "3" align = "center" width="70%">
	<tr bgcolor = "#d6dddd">
		<th>Número</th>
		<th>Nome</th>
                <th>Cidade</th>
		<th>Sigla do Partido</th>
		<th>Modalidade</th>
		<th>Descrição</th>
                <th>Remover?</th>
	</tr>
<?php
$busca = $_POST["busca"];
$modo = $_POST["modo_pesquisa"];


include "conexao.php";

$result= mysql_query("Select * from tb_candidato where $modo like '%$busca%';");
$num_linhas = mysql_num_rows($result);

for ($i=0;$i<$num_linhas;$i++){

$id = mysql_result($result,$i,0);    
$numero = mysql_result($result,$i,3);
$nome= mysql_result($result,$i,1);
$partido = mysql_result($result,$i,5);
$modalidade = mysql_result($result,$i,2);
$cidade = mysql_result($result,$i,4);
$descricao = mysql_result($result,$i,6);
$resultado = mysql_query("SELECT cidades.nome FROM cidades where cod_cidades = $cidade;");
$nome_cidade = (mysql_fetch_object($resultado));
$cidade_tratada = utf8_encode($nome_cidade->nome);
$nome_tratado = utf8_encode($nome);
$descricao_tratada = utf8_encode($descricao);



echo "<tr><h1>" ;
echo "<td> <font face=\"arial\"><h3>$numero </td>";
echo "<td> <font face=\"arial\"><h3>$nome_tratado </td>";
echo "<td> <font face=\"arial\"><h3>$cidade_tratada</td>";
echo "<td> <font face=\"arial\"><h3>$partido </td>";
echo "<td> <font face=\"arial\"><h3>$modalidade </td>";
echo "<td> <font face=\"arial\"><h3>$descricao_tratada </td>";
echo "<td> <font face=\"arial\"><h3><a href='delete.php?id=$id'>Deletar?</a></td>";
echo "</tr></h1>";

}

mysql_close($con);
?>
</table>
<hr>
<p align = "center"> <a href="pesquisa_candidato.html"> Voltar </p>

</body>
</html>