<?php
$numero = $_POST["numero"];
$nome = $_POST["nome"];
$partido = $_POST["partido"];
$descricao = $_POST["descricao"];


	
	

include "conexao.php";

       $sql= mysql_query("update tb_candidato set nome='$nome', partido='$partido',descricao='$descricao' where 
	numero='$numero' ");

if (!$sql)
  {
  die('Error: ' . mysql_error());
  }
else
	echo "Atualizado!";
	echo "<p align=\"center\"><a href=\"pag_adm.html\">Voltar</p>";
	


mysql_close($con);

?>