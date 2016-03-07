<?php

// Caminho do Mysql
$caminho="localhost:3306";

// Usuario de Acesso ao Mysql
$usuario="root";

// Senha de Acesso do Mysql
$senha=""; 

// Nome do Banco
$banco="Candidates";

// Estabelece  a Conexao com o Mysql
$con = mysql_connect($caminho,$usuario,$senha);


// Seleciona a Base de Dados
mysql_select_db($banco);

// Tratamento UTF-8 do MYSQL
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>