// This see more filter function


var PETdiv, inputInDiv, labelInDiv, brInDiv;

// On load document
// Hide checkboxes and labels
$(document).ready(function(){
  
  PETdiv = document.getElementsByClassName("more_filter");

  for (var j = 0; j < PETdiv.length; j++){

    var inputInDiv = PETdiv[j].getElementsByTagName("input");
    var labelInDiv = PETdiv[j].getElementsByTagName("label");
    var brInDiv = PETdiv[j].getElementsByTagName("br");


    for (var i = 0; i < inputInDiv.length; i++){

      inputInDiv[i].style.display = "none";
      labelInDiv[i].style.display = "none";
      brInDiv[i].style.display = "none";
    }
  }
});

// Show and hide checkboxes and labels
function seeFilter(getBtn, getPETdiv) {

  var btn = document.getElementById(getBtn);
  

  if (btn.innerHTML === "See more") { 

    btn.innerHTML = "See less";
    
    loopDisplay("inline", getPETdiv);
    
  }
  else {
      
      btn.innerHTML = "See more";

      loopDisplay("none", getPETdiv);

  }
}

// Show and hide subfunction
function loopDisplay(textDisplay, getPETdiv){

  PETdiv = document.getElementById(getPETdiv);

  var inputInDiv = PETdiv.getElementsByTagName("input");
  var labelInDiv = PETdiv.getElementsByTagName("label");
  var brInDiv = PETdiv.getElementsByTagName("br");

  
  for (var i = 0; i < inputInDiv.length; i++){

    inputInDiv[i].style.display = textDisplay;
    labelInDiv[i].style.display = textDisplay;
    brInDiv[i].style.display = textDisplay;

  }

}