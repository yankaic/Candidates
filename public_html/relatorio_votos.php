<?php
	include "conecta_mysql.inc";
	
	$result_votaram= mysql_query("select count(titulo) from eleitor where votou='1'");
	$result_nao_votaram= mysql_query("select count(titulo) from eleitor where votou='0'");
	$result_prefeito= mysql_query("select nome,max(quantidadevotos) from candidato where modalidade='prefeito'");
	$result_vereador= mysql_query("select nome,max(quantidadevotos) from candidato where modalidade='vereador'");
	
	$votaram=mysql_result($result_votaram,0,0);
	$nvotaram=mysql_result($result_nao_votaram,0,0);
	$prefeito=mysql_result($result_prefeito,0,0);
	$vereador=mysql_result($result_vereador,0,0);
	mysql_close($con);
	
	echo"<h2 align=\"center\">";
	echo "Número de eleitores que votaram : $votaram <br>";
	echo "Número de eleitores que não votaram : $nvotaram <br>";
	echo "Prefeito Eleito : $prefeito <br>";
	echo "Vereador Eleito : $vereador <br>";
	
	?>
	
	