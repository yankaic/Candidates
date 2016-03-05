<?php
$nome = $_POST["nome_partido"];
$sigla = $_POST["sigla_partido"];


include "conexao.php";

$result= mysql_query("insert into tb_partidos VALUES (null,'$nome','$sigla')");
mysql_close($con);

	echo "Cadastrado com sucesso!";
	echo "<br>";
	echo "<a href=\"pag_adm.html\">Voltar ao inicio</a><br>";

?>