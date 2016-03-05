<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
  <title>Candidates - Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./material.css">
  <script src="./material.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <!-- Square card -->
  <style>
    .demo-card-square.mdl-card {
      width: 350px;
      height: 350px;
    }
    .demo-card-square > .mdl-card__title {
      color: #fff;
      background:
      url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
    }
    .mdl-card-login{
      background-color: #f7f7f7;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
      padding: 32px;
      text-align: center;
    }
    .image{
      margin-bottom: 20px;
    }
    .textfield{
      background-color: white;
      border-style: solid;
      border-width: 1px;
      border-color: #E6E6E6;
      border-radius: 5px;
      height: 40px;
    }
    .textfield:focus{        
      box-shadow:  0px 0px 2px #cccccc;
    }
    .button{
      width: 100%;
      top:8px;
    }

    .others_links{
        padding: 20px 5px 5px 2px;
        font-size: 5px;
      }
      .left-side{
        width: 50%;
        float:left;
        padding:  -10px;
      }
      .right-side{
        width: 50%;
        top: 0;
        right: 0;
        float: right;
        text-align: right;
        color: #2862FF;
      }
      
    .notify{
      padding: 20px;
      color: #fff; 
      font-size:1.1em; 
      border-radius:4px; 
      text-align:center;
      position:fixed;
      width: 100%;
      background-color:#c9302c;
    }

  </style>

  <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-card-login">
    <div class="image">
      <img src="img/user_icon.png">
    </div>
    <form action="processaLogin.php" method="post">
      <div class="mdl-textfield mdl-js-textfield textfield">
        <input class="mdl-textfield__input" type="text" id="sample1" name="username"> 
        <label class="mdl-textfield__label" for="sample1">login</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield textfield">
        <input class="mdl-textfield__input" type="password" id="sample1" name="password">
        <label class="mdl-textfield__label" for="sample1">senha</label>
      </div>

      <!-- Colored raised button -->
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored button" value="submit">
        Entrar
      </button>

      <div class="others_links">
        <div class="left-side">
          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
            <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
            <span class="mdl-checkbox__label">Permanecer</span>
          </label></div>
        <div class="right-side">
          <label class="mdl-label">
            
            <span class="mdl-checkbox__label">Esqueceu?</span>
          </label></div>
      </div>

      <?php
      error_reporting(0);
      if ($_GET['pg'] == 'erro_login')
        //se estivermos retornando de process.php com um erro de login, avisa falha de login ao usuário
      {
        echo '<div class="\'notify" not-fail\'="">Login ou senha incorretos. Tente novamente!</div>';
      }
      else{}
?>
    </form>
  </div>
</body>
</html>