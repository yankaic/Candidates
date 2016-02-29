<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysql_connect("127.0.0.1:3306", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("Candidates") or die("BD inacessível, checar acesso de usuário");

// A vriavel $result pega as varias $username e $password, pesquisa na tabela de usuarios
$result = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password`= '$password'");

/* se achou uma linha (match) no bd, redireciona pra página logada. Caso contrário, retorne à página de login, com uma flag de erro. */
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:/Candidates/public_html/title.html');
}
else{
	error_reporting(0);
	unset ($_SESSION['username']);
	unset ($_SESSION['password']);
	header('location:/Candidates/public_html/login.php?pg=erro_login');
	
	}

?>