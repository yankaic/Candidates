<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?
include "conexao.php";
?>
<html>
    <head>
        <title>Candidates - Splash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./material.css">
        <script src="./material.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript">
            //jQuery 
            $(function () {
                $('#cod_estados').change(function () {
                    if ($(this).val()) {
                        $('#cod_cidades').hide();
                        $('.carregando').show();
                        $.getJSON('cidades.ajax.php?search=', {cod_estados: $(this).val(), ajax: 'true'}, function (j) {
                            var options = '<option value=""></option>';
                            for (var i = 0; i < j.length; i++) {
                                options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                            }
                            $('#cod_cidades').html(options).show();
                            $('.carregando').hide();
                        });
                    } else {
                        $('#cod_cidades').html('<option value="">-- Escolha um estado --</option>');
                    }
                });
            });
        </script>           


        <?php
        /* verifica se existe uma sessão de usuário, para evitar que a página sea acessível pelo seu endereço direto. */
        session_start();
        if ((!isset($_SESSION['username']) == true) and ( !isset($_SESSION['password']) == true)) {
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            header('location:login.php');
        }

        $logado = $_SESSION['username'];
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
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="cadastro">
                    <form method="post" action="incluir.php">
                        <fieldset>
                            <legend><b>Cadastro de Candidato</b></legend>
                            <table width="500px">
                                <tr>
                                    <td>Nome:</td>
                                    <td><input type="text" name="nome" size="40"></td>
                                </tr>
                                <tr>
                                    <td>Cargo:</td>
                                    <td>
                                        <input type="radio" name="cargo" value="Prefeito"> Prefeito
                                        <input type="radio" name="cargo" value="Vereador"> Vereador
                                    </td>
                                </tr>
                                <?php
                                $queryEstado = "SELECT cod_estados, sigla FROM estados ORDER BY sigla";
                                $resultF = mysql_query($queryEstado) or die(mysql_error());
                                ?>
                                <tr>
                                    <td><label for="cod_estados">Estado:</label></td>
                                    <td>
                                        <select name="cod_estados" id="cod_estados">
                                            <option value=""></option>
                                            <?php
                                            while ($row = mysql_fetch_assoc($resultF)) {
                                                echo '<option value="' . $row['cod_estados'] . '">' . $row['sigla'] . '</option>';
                                            }
                                            ?>
                                        </select>        
                                    </td>
                                <tr>
                                    <td><label for="cod_cidades">Cidade:</label></td>
                                    <td>
                                        <select name="cod_cidades" id="cod_cidades" >
                                            <option value="">-- Escolha o estado --</option> 
                                        </select>
                                    </td>
                                </tr>
                                
                                <?php
                                $queryPartido = "select * from tb_partidos order by sigla";
                                $resultP = mysql_query($queryPartido) or die(mysql_error());
                                ?>
                                
                                <td>Partido:</td>
                                <td>
                                    <select name="partido">
                                        <?php
                                        while ($row = mysql_fetch_array($resultP)) {
                                            ?>
                                            <option value="<? echo $row['id']; ?>"><? echo $row['sigla']; ?></option>
                                        <? } ?>
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                    <td>Número:</td>
                                    <td><input type="text" name="numero" size="15"></td>
                                </tr>
                                <tr>
                                    <td>Descrição (200 char):</td>
                                    <td><input type="text" name="shortBio" size="150"></td>
                                </tr>
                            </table>    
                        </fieldset>
                        <input type="submit" value="Salvar Candidato"/>
                        <input type="reset" value="Limpar Dados"/>
                        <br>
                        <br>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>