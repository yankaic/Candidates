<?php
	$modalidade = $_POST["modalidade"];	
	$nome = $_POST["nome_candidato"];
	$numero = $_POST["num_candidato"];
	$cidade = $_POST["cidade"];
	$num_partido = $_POST["partido"];
	$descricao = $_POST["descricao_candidato"];
	$imagem_candidato = $_POST["imagem_candidato"];
	
	include "conexao.php";
	
	mysql_query("insert into tb_candidato VALUES (null,'$nome','$modalidade','$numero',
	'$cidade','$num_partido','$descricao','$imagem_candidato','0')");
	mysql_close($con);
	if (mysql_affected_rows() == 1) {
	echo "Cadastrado com sucesso!";
	echo"<br>";
	echo "<a href=\"pag_adm.html\">Voltar ao início</a><br>";
        }
        else {
            echo "erro ao cadastrar candidato<br>";
            echo "<a href=\"pag_adm.html\">Voltar ao início</a><br>";
        }
	
?>