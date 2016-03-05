<?php
	$prefeito = $_POST["cod_prefeito"];
	$vereador = $_POST["cod_vereador"];
	
	include "conecta_mysql.inc";
	
	$result = mysql_query("select quantidadevotos from candidato where numero='$prefeito'");
	$votos= mysql_result($result,0,0);
	$votos = $votos + 1;
	mysql_query("update candidato set quantidadevotos='$votos' where numero='$prefeito'");
	
	$result = mysql_query("select quantidadevotos from candidato where numero='$vereador'");
	$votos= mysql_result($result,0,0);
	$votos = $votos + 1;
	mysql_query("update candidato set quantidadevotos='$votos' where numero='$vereador'");
	mysql_close($con);
	
	?>
<html>
<body><center>
	<h1 align ="center">FIM<br></h1>
	<h4><a href="PaginaInicial.html">Sair</a><br>
	</center>
	
</body>
</html>