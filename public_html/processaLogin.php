<?php 
// estrutura do bd:
// database: Candidates
// tabela: users
// colunas: ID (primaria), username, password
// dois ususarios para teste: pedro:1q2w3e4r e yan:1qaz2wsx
// session_start inicia a sessão
include "conexao.php";
session_start();
// as variáveis username e password recebem os dados digitados na página anterior
$username = $_POST['username'];
$password = $_POST['password'];

// A variavel $result pega as variaveis $username e $password, pesquisa na tabela de usuarios
$result = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password`= '$password'");

/* se achou uma linha (match) no bd, redireciona pra página logada. Caso contrário, retorne à página de login, com uma flag de erro. */
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:pesquisa_candidato.php');
}
else{
	error_reporting(0);
	unset ($_SESSION['username']);
	unset ($_SESSION['password']);
	header('location:login.php?pg=erro_login');
	
	}

?>