<html>
  <head>
    <title>
      Candidatos - Busca
    </title>
    <meta charset="UTF-8">
    <link id="theme-style" rel="stylesheet" href="./themes/blue.css">
    <script src="./material.js"></script>
    <script src="./scripts/theme_script.js"></script><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

  <style>
    .mdl-data-table{
      margin:20px; 
      width: 97%;
    }
  </style>

  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Candidates</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <!-- Right aligned menu below button -->
          <button id="demo-menu-lower-right"
                  class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">format_color_fill</i>
          </button>

          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
              for="demo-menu-lower-right">
            <li class="mdl-menu__item blue_select" id="blueColor" >
              <i class="material-icons">format_paint</i>   Azul</li>
            <li class="mdl-menu__item magenta-select"id="magentaColor">
              <i class="material-icons">format_paint</i>   Rosa</li> 
            <li class="mdl-menu__item green-color">
              <i class="material-icons">format_paint</i>   Verde</li>
          </ul>

          <a class="mdl-navigation__link" href=""></a>

          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
               mdl-textfield--floating-label mdl-textfield--align-right">



            <label class="mdl-button mdl-js-button mdl-button--icon"
                   for="waterfall-exp">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" name="sample"
                     id="waterfall-exp">
            </div>
          </div>
        </div>
      </header>

      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Candidates</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link"href="cadastroCandidato.php">Cadastro de Prefeito/Vereador</a><br>
          <a class="mdl-navigation__link"href="pesquisa_candidato.html">Buscar Candidatos Cadastrados</a><br>
          <a class="mdl-navigation__link"href="atualiza_candidato.html">Alterar dados do Candidato</a><br>
          <a class="mdl-navigation__link"href="cadastro_partido.html">Cadastro de Partido</a><br>
        </nav>
      </div>

      <main class="mdl-layout__content">
        <div class="page-content">
        </div>

        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
          <thead>
            <tr>
              <th>Número</th>
              <th>Nome</th>
              <th>Cidade</th>
              <th>Sigla do Partido</th>
              <th>Modalidade</th>
              <th>Descrição</th>
              <th>Remover?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>14</td>
              <td>Auricio</td>
              <td>Vitoria da Conquista</td>               
              <td>PFL</td>
              <td>Prefeito</td>             
              <td>Olá</td>             
              <td>Remover?</td>
            </tr>

            <?php
            include "conexao.php";

            $result = mysql_query("Select * from tb_candidato;");
            $num_linhas = mysql_num_rows($result);

            for ($i = 0; $i < $num_linhas; $i++) {

              $id = mysql_result($result, $i, 0);
              $numero = mysql_result($result, $i, 3);
              $nome = mysql_result($result, $i, 1);
              $partido = mysql_result($result, $i, 5);
              $modalidade = mysql_result($result, $i, 2);
              $cidade = mysql_result($result, $i, 4);
              $descricao = mysql_result($result, $i, 6);
              $resultado = mysql_query("SELECT cidades.nome FROM cidades where cod_cidades = $cidade;");
              $nome_cidade = (mysql_fetch_object($resultado));
              $cidade_tratada = utf8_encode($nome_cidade->nome);
              $nome_tratado = utf8_encode($nome);
              $descricao_tratada = utf8_encode($descricao);



              echo "<tr>";
              echo "<td> $numero </td>";
              echo "<td> $nome_tratado </td>";
              echo "<td> $cidade_tratada</td>";
              echo "<td> $partido </td>";
              echo "<td> $modalidade </td>";
              echo "<td> $descricao_tratada </td>";
              echo "<td> <a href='delete.php?id=$id'>Deletar?</a></td>";
              echo "</tr>";
            }

            mysql_close($con);
            ?>

          </tbody>
        </table>


      </main>
    </div>


    <!--
        <h1 align = "center"> Candidatos </h1>
        <hr>
        <table cellspacing = "3" align = "center" width="70%">
          <tr bgcolor = "#d6dddd">
            <th>Número</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Sigla do Partido</th>
            <th>Modalidade</th>
            <th>Descrição</th>
            <th>Remover?</th>
          </tr>
    <?php
    include "conexao.php";

    $result = mysql_query("Select * from tb_candidato;");
    $num_linhas = mysql_num_rows($result);

    for ($i = 0; $i < $num_linhas; $i++) {

      $id = mysql_result($result, $i, 0);
      $numero = mysql_result($result, $i, 3);
      $nome = mysql_result($result, $i, 1);
      $partido = mysql_result($result, $i, 5);
      $modalidade = mysql_result($result, $i, 2);
      $cidade = mysql_result($result, $i, 4);
      $descricao = mysql_result($result, $i, 6);
      $resultado = mysql_query("SELECT cidades.nome FROM cidades where cod_cidades = $cidade;");
      $nome_cidade = (mysql_fetch_object($resultado));
      $cidade_tratada = utf8_encode($nome_cidade->nome);
      $nome_tratado = utf8_encode($nome);
      $descricao_tratada = utf8_encode($descricao);



      echo "<tr>";
      echo "<td> $numero </td>";
      echo "<td> $nome_tratado </td>";
      echo "<td> $cidade_tratada</td>";
      echo "<td> $partido </td>";
      echo "<td> $modalidade </td>";
      echo "<td> $descricao_tratada </td>";
      echo "<td> <a href='delete.php?id=$id'>Deletar?</a></td>";
      echo "</tr>";
    }

    mysql_close($con);
    ?>
        </table>
        <hr>
        <p align = "center"> <a href="pesquisa_candidato.html"> Voltar </p>-->

  </body>
</html>