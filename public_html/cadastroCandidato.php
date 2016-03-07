<?php
include "conexao.php"
?>
<html>
  <head> <title>Cadastro de Candidato</title>
    <meta charset="UTF-8">
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

  </head>
  <body>
    <?php
    $queryPartido = "select * from tb_partidos order by sigla";
    $resultP = mysql_query($queryPartido) or die(mysql_error());
    ?>
    <form name="pag_cadastro" method ="post" action="cad-candidato.php" onsubmit="return valida(this)">

      <table size="50%">
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
            <input type="text" name="nome_candidato">
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
              <?php
              while ($row = mysql_fetch_assoc($resultF)) {
                echo '<option value="' . $row['cod_estados'] . '">' . $row['sigla'] . '</option>';
              }
              ?>
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
              <?php
              while ($row = mysql_fetch_array($resultP)) {
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['sigla']; ?></option>
              <?php } ?>
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
    </form>

  </body>
</html>