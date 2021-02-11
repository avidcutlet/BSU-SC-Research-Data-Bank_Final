// Dynamic function for show password
    function showPassword(pass_input, pass_btn, pass_icon){

      var passInput = document.getElementById(pass_input);
      var passBtn = document.getElementById(pass_btn);
      var passIcon = document.getElementById(pass_icon);

      if (passIcon.className === "fa fa-eye") {

        passInput.type = "text";
        passBtn.className += " active";
        passIcon.className = passIcon.className.replace("fa fa-eye", "fa fa-eye-slash");

      }else {

        passInput.type = "password";
        passBtn.className = passBtn.className.replace(" active", "");
        passIcon.className = passIcon.className.replace("fa fa-eye-slash", "fa fa-eye");

      }

    }