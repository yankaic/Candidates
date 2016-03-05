<?php

header('Cache-Control: no-cache');
header('Content-type: application/xml; charset="utf-8"', true);

require("conexao.php");

$cod_estados = mysql_real_escape_string($_REQUEST['cod_estados']);

$cidades = array();

$sql = "SELECT cod_cidades, nome
		FROM cidades
		WHERE estados_cod_estados=$cod_estados
		ORDER BY nome";
$res = mysql_query($sql);
while ($row = mysql_fetch_assoc($res)) {
    $cidades[] = array(
        'cod_cidades' => (utf8_encode($row['nome'])),
        'nome'        => (utf8_encode($row['nome'])),
    );
}

echo( json_encode($cidades) );
?>