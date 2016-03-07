<?php
//configurações do banco de dados
$servidor = 'localhost:3306';
$usuario = '';
$senhaBanco = '';
$banco = 'Candidates';

$con = mysql_connect($servidor, $usuario, $senhaBanco);
       mysql_select_db($banco);
?>