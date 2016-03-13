<?php
include "conexao.php"
?>
<html>
  <head> <title>Cadastro de Candidato</title>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="./material.css">
    <link rel="stylesheet" href="./materialize.css">
    <script src="./material.js"></script>    
    <script src="./general_scripts.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script type="text/javascript">
      //jQuery 
      $(function () {
      $('#cod_estados').change(function () {
      if($(this).val()) {
      $('#cod_cidades').hide();
      $('.carregando').show();
      $.getJSON('cidades.ajax.php?search=', {cod_estados: $(this).val(), ajax: 'true'}, function (j) {
      var options = '<option value=""></option>';
      for(var i = 0; i < j.length; i++) {
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
    <script language="javascript">
      function valida(pag_cadastro) {

      if(pag_cadastro.nome_candidato.value == ""){
      alert ("Nome do candidado não pode ser nulo");
      return false;
      }

      if(pag_cadastro.nome_candidato.value == ""){
      alert ("Nome do candidado não pode ser nulo");
      return false;
      }

      if(pag_cadastro.modalidade[0]cheked){
      if(pag_cadastro.num_candidato.value.length = ! 2){
      alert("O número do prefeito deve ser de exatamente 2 digitos");
      return false;
      }
      return false;
      }

      if(pag_cadastro.modalidade[1]cheked){
      if(pag_cadastro.num_candidato.value.length = ! 5)
              alert("O número do vereador deve ser de exatamente 5 digitos");
      return false;
      return false;
      }

      if(pag_cadastro.partido_candidato.value == ""){
      alert ("O Partido do candidato não pode ser nulo");
      return false;
      }

      if(pag_cadastro.partido_candidato.value.indexOf('p', 0, 0) == - 1){
      alert ("O primeiro caracter da sigla do partido tem que ser "P"");
      return false;
      }

      if(pag_cadastro.descricao_candidato.value.length > 300){
      alert("O campo de descrição deve ser de no máximo de 300 caracteres");
      return false;
      }

      return true;
      }
    </script>
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

      /* ==========  Select Field Variables ========== */
      $color-black: "0,0,0";
      $select-background-color: transparent;
      $select-border-color: unquote("rgba(#{$color-black}, 0.12)") !default;
      $select-font-size: 16px;
      $select-color: unquote("rgba(#{$color-black}, 0.26)") !default;
      $select-padding: 4px;

      /* ==========  Select Field ========== */

      /* Style Select Field */
      select {
        font-family: inherit;
        background-color: transparent;
        width: 100%;
        padding: $select-padding 0;
        font-size: $select-font-size;
        color: $select-color;
        border: none;
        border-bottom: 1px solid $select-border-color;
      }

      /* Remove focus */
      select:focus {
        outline: none}

      /* Hide label */
      .mdl-selectfield label {display: none;}
      /* Use custom arrow */
      .mdl-selectfield select {appearance: none}
      .mdl-selectfield {
        font-family: 'Roboto','Helvetica','Arial',sans-serif;
        position: relative;
        &:after {
          position: absolute;
          top: 0.75em;
          right: 0.5em;
          /* Styling the down arrow */
          width: 0;
          height: 0;
          padding: 0;
          content: '';
          border-left: .25em solid transparent;
          border-right: .25em solid transparent;
          border-top: .375em solid $select-border-color;
          pointer-events: none;
        }
      }

      /* ==========  Demo CSS ========== */
      body {
        padding: 20px;
        background: #fafafa;
        font-family: 'Roboto','Helvetica','Arial',sans-serif;
      }
      .demo {
        width: 200px;
        padding: 20px;
        margin: 0 auto;
        top: 50%;
        margin-top: -2em;
        position: absolute;
        right: 0;
        left: 0;
      }

    </style>

  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Candidates</span>
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

      <main class="mdl-layout__content">
        <div class="page-content">
          <br><br>

          <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-card-form">

            <form name="pag_cadastro" method ="post" action="cad-candidato.php" onsubmit="return valida(this)">

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="nome_candidato" name="nome_candidato"> 
                <label class="mdl-textfield__label" for="nome_candidato">Nome</label>
              </div>



              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="num_candidato" name="num_candidato">
                <label class="mdl-textfield__label" for="num_candidato">Número</label>
                <span class="mdl-textfield__error">Não pode conter letras ou dígitos!</span>
              </div>
              <br>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                <span class="mdl-radio__label">Modalidade:    </span>

                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-prefeito">
                  <input type="radio" id="option-prefeito" class="mdl-radio__button" name="modalidade" value="prefeito" checked>
                  <span class="mdl-radio__label">Prefeito</span>
                </label>

                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-vereador">
                  <input type="radio" id="option-vereador" class="mdl-radio__button" name="modalidade" value="vereador">
                  <span class="mdl-radio__label">Vereador</span>
                </label>
              </div>
              <br>
              <?php
              $queryPartido = "select * from tb_partidos order by sigla";
              $resultP = mysql_query($queryPartido);
              ?>

              <?php
              $queryEstado = "SELECT cod_estados, sigla FROM estados ORDER BY sigla";
              $resultF = mysql_query($queryEstado) or die(mysql_error());
              ?>

              <label for="cod_estados">Estado:</label>

              <select name="cod_estados" id="cod_estados">
                <option value=""></option>
                <?php
                while ($row = mysql_fetch_assoc($resultF)) {
                  echo '<option value="' . $row['cod_estados'] . '">' . $row['sigla'] . '</option>';
                }
                ?>
              </select>      


              <label for="cod_cidades">Cidade:</label>

              <select name="cod_cidades" id="cod_cidades" >
                <option value="">-- Escolha o estado --</option> 
              </select>
              <br>

              Sigla do Partido

              <select name="partido">
                <?php
                while ($row = mysql_fetch_array($resultP)) {
                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['sigla']; ?></option>
                <?php } ?>
              </select>
              <br>


              <!-- Floating Multiline Textfield -->
              <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows= "3" id="descricao_candidato" name="descricao_candidato" ></textarea>
                <label class="mdl-textfield__label" for="descricao_candidato">Descrição...</label>
              </div>

              <br>
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored button" value="submit">
                Cadastrar
              </button>




<!--              <table size="50%">
                <tr>
                  <td align="right">
                    Modalidade
                  </td><td>
                    <input type="radio" name="modalidade" value="prefeito">Prefeito
                    <input type="radio" name="modalidade" value="vereador">Vereador 
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    Nome
                  </td><td>			
                    <input type="text" name="nome_candisdato">
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    Número
                  </td><td>
                    <input type="text" name="num_candidato">
                  </td>
                </tr>
              <?php
              $queryEstado = "SELECT cod_estados, sigla FROM estados ORDER BY sigla";
              $resultF = mysql_query($queryEstado) or die(mysql_error());
              ?>
                <tr>
                  <td align="right">
                    <label for="cod_estados">Estado:</label>
                  </td>
                  <td>
                    <select name="cod_estados" id="cod_estados">
                      <option value=""></option>
              
                    </select>        
                  </td>
                <tr>
                <tr>
                  <td align="right"><label for="cod_cidades">Cidade:</label></td>
                  <td>
                    <select name="cod_cidades" id="cod_cidades" >
                      <option value="">-- Escolha o estado --</option> 
                    </select>
                  </td>
                </tr>
                </tr>
                <tr>
                  <td align="right">
                    Sigla do Partido
                  </td><td>
                    <select name="partido">
             
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    Descrição
                  </td><td>
                    <textarea name="descricao_candidato" rows="10" cols="30"></textarea>
                  </td>
                </tr><tr>
                  <td align="right">
                    Imagem 
                  </td><td>
                    <input type="file" name="imagem_candidato">
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <input type="submit" value="Cadastrar">
                  </td><td>
                    <input type="reset" value="Corrigir">
                  </td>
                </tr>
              </table>
            </form></div></div>-->
          </div>
        </div>
      </main>
    </div>
  </body>
</html>