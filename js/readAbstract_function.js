// This abstract function is for read more and read less

function readAbstract(modalLink,rsid) {
  var dots = document.getElementById("dots_"+rsid);
  var moreText = document.getElementById("readMore_"+rsid);
  var btnText = document.getElementById("readBtn_"+rsid);
  

  if (btnText.innerHTML === "Read more") { 
    btnText.innerHTML = "See full details";
    moreText.style.display = "inline";
    dots.style.display = "none";

  }
  else {

    var modal = "#" + modalLink + rsid;
    $(modal).modal('show');  
    
  }

  modal, modalLink, rsid = "";
}