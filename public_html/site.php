<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Candidates - Splash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./material.css">
        <script src="./material.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


        <?php  
/* verifica se existe uma sessão de usuário, para evitar que a página sea acessível pelo seu endereço direto. */
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
    }

$logado = $_SESSION['login'];
?>
    </head>
    <body>
        <style>
            .table {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                padding: 50px;
                text-align: center;
            }
        </style>
        <!-- Always shows a header, even in smaller screens. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Candidates</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation. We hide it in small screens. -->
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                        <a class="mdl-navigation__link" href="">//Searchfield</a>
                    </nav>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Candidates</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="prefeitos.html">Prefeitos</a>
                    <a class="mdl-navigation__link" href="vereadores.html">Vereadores</a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content"><!-- Your content goes here --></div>
            </main>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="table">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Candidato</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><span>Guilherme</span>
                            <span class="mdl-list__item-text-body">
                                Guilherme Menezes é o atual prefeito de Vitória da Conquista.
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">HERZAO</td><span>Herzem Gusmão</span>
                            <span class="mdl-list__item-text-body">
                                Radialista, atual deputado estadual pelo PMDB.
                            </span>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">ABEL</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
