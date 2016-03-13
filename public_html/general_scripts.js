"use strict";
function general_scripts(){
  function onChangeTheme()
  {
    $("#magentaColor").click(function(){
    });
  }
  
  function setTheme(theme)
  {
    $("#theme-style").attr("href", "themes/" + theme + ".css");
  }

  this.start = function(){

    onChangeTheme();

    setTheme("green");

  };
}

$(function(){
  window.app = new general_scripts();
  window.app.start();  
});