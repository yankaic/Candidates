<html>
    <meta charset="UTF-8">


    <?php
    $modalidade = $_POST["modalidade"];
    $nome = $_POST["nome_candidato"];
    $numero = $_POST["num_candidato"];
    $cidade = ($_POST["cod_cidades"]);
    $num_partido = $_POST["partido"];
    $descricao = $_POST["descricao_candidato"];
    $cidade_tratada = utf8_encode($cidade);
    include "conexao.php";

    mysql_query("insert into tb_candidato VALUES (null,'$nome','$modalidade','$numero',
	'$cidade_tratada','$num_partido','$descricao')");
    if (mysql_affected_rows() == 1) {
        echo "Cadastrado com sucesso!";
        echo"<br>";
        echo "<a href=\"pag_adm.html\">Voltar ao início</a><br>";
    } else {
        echo "erro ao cadastrar candidato<br>";
        echo "<a href=\"pag_adm.html\">Voltar ao início</a><br>";
    }
    mysql_close($con);
    ?>

</html>