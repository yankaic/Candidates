<?php
include 'conexao.php';
$id = 0;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_candidato  WHERE id = $id";
    $deletei = mysql_query($sql);
    echo "Candidato deletado com sucesso!";
    echo "<p align=\"center\"><a href=\"pag_adm.html\">Voltar</p>";
}
?>
<html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <link   href="bootstrap.min.css" rel="stylesheet">
            <script src="bootstrap.min.js"></script>
            <title>Deletar Candidato?</title>
        </head>

        <body>
            <div class="container">


                <div class="row">
                    <h3>Deletar Candidato</h3>
                </div>

                <form class="form-horizontal" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <p class="alert alert-error">Tem certeza que deseja deletar?</p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a class="btn" href="pag_adm.html">Não</a>
                    </div>
                </form>

            </div> <!-- /container -->
        </body>
    </html>