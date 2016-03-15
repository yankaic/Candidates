<html>
  <head> <title>Alteração de Candidato</title>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="./material.css">
    <link rel="stylesheet" href="./materialize.css">
    <script src="./material.js"></script>    
    <script src="./general_scripts.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <style>
      .mdl-card-form{
        /*background-color: #f7f7f7;*/
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        padding: 32px;
        text-align: center;
      }

      .demo-card-square.mdl-card {
        width: 550px;
        height: 500px;
      }
    </style>

  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Alteração de Candidato</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
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

      <?php
      $numero_candidato = $_POST["num_candidato"];
      include "conexao.php";

      $result = mysql_query("SELECT * FROM tb_candidato WHERE numero= $numero_candidato");
      $num_linhas = mysql_num_rows($result);

      if ($num_linhas != 0) {
        $numero = mysql_result($result, 0, 0);
        $nome = mysql_result($result, 0, 1);
        $partido = mysql_result($result, 0, 5);
        $modalidade = mysql_result($result, 0, 4);
        $descricao = mysql_result($result, 0, 6);



        mysql_close($con);
      }

      ?>

      <main class="mdl-layout__content">
        <div class="page-content">
          <br><br>

          <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-card-form">

            <form name="pag_cadastro" method ="post" action="atualiza_candidato.php" onsubmit="return valida(this)">

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="nome_candidato" name="nome_candidato" value=<?php echo $nome ?>> 
                <label class="mdl-textfield__label" for="nome_candidato">Nome</label>
              </div>



              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="num_candidato" name="num_candidato"value=<?php echo $numero ?>>
                <label class="mdl-textfield__label" for="num_candidato">Número</label>
                <span class="mdl-textfield__error">Não pode conter letras ou dígitos!</span>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="id_partido" name="id_partido" value=<?php echo $partido ?>>
                <label class="mdl-textfield__label" for="id_partido">Partido</label>
                <span class="mdl-textfield__error">Não pode conter letras ou dígitos!</span>
              </div>

              <!-- Floating Multiline Textfield -->
              <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows= "3" id="descricao" name="descricao"value=<?php echo $descricao ?> ></textarea>
                <label class="mdl-textfield__label" for="descricao">Descrição...</label>
              </div>

              <br> <br>
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored button" value="submit">
                Salvar Modificações
              </button>

              <?php
              $numero_candidato = $_POST["num_candidato"];
              include "conexao.php";

              $result = mysql_query("SELECT * FROM tb_candidato WHERE numero= $numero_candidato");
              $num_linhas = mysql_num_rows($result);

              if ($num_linhas != 0) {
                $numero = mysql_result($result, 0, 0);
                $nome = mysql_result($result, 0, 1);
                $partido = mysql_result($result, 0, 5);
                $modalidade = mysql_result($result, 0, 4);
                $descricao = mysql_result($result, 0, 6);



                echo "<form method=\"POST\" action=\"atualiza_candidato.php\">";
                echo "<p>Numero <input type=\"text\" name=\"numero\" value=\"$numero\" readonly=\"true\"></p>";
                echo "<p>Nome <input type=\"text\" name=\"nome\" value=\"$nome\"></p>";
                echo "<p>Partido <input type=\"text\" name=\"id_partido\" value=\"$partido\"></p>";
                echo "<p>Descricao <input type=\"text\" name=\"descricao\" value=\"$descricao\"></p>";

                mysql_close($con);

                echo "<input type=\"submit\" value=\"Atualizar\">";
                echo "</form>";
              } else
                echo "<p>Candidato nao encontrado!";
              ?>
            </form>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
