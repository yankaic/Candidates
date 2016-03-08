function general_scripts()
{
  this.start = function(){    
    
   $("#select").mdlselect({
    value: ["0", "1", "2", "3"],
    label: ["n/a", "Option 1", "Option 2", "Option 2"],
    fixedHeight: '10em'
  });
  
  };
}

$(function () {
  window.app = new general_scripts();
  window.app.start();
});