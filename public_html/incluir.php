<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Candidatos</title>
    </head>
    <body>
        <?php
        include "conexao.php";

        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $partido = $_POST['partido'];
        $estado = $_POST['cod_estados'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cod_cidades'];
        $queryCandidato = "INSERT INTO tb_candidato 
                        VALUES(null,'$nome','$cargo','$numero','$cidade',
                        '$estado','$partido')";
        mysql_query($queryCandidato) or die(mysql_error());
        if (mysql_affected_rows() == 1) {

            echo "<h3>Dados do Candidato</h3>";
            echo "<b>Nome:</b> $nome <br>";
            echo "<b>Cargo</b> $cargo <br>";
            echo "<b>Numero:</b> $numero <br>";
            echo "<b>Cidade:</b> $cidade <br><br>";
            echo "<b>Estado:</b> $estado <br><br>";
            echo "<b>Partido:</b> $partido <br><br>";
            echo "Candidato Salvo com Sucesso...";
        }
        ?>
    </body>
</html>
