function submitValProfessor() {
    
    
    var mi = document.getElementById("form_mi_professor").value;
    var actualFile1 = $('#form_file1_professor')[0].files;
    var actualFile2 = $('#form_file2_professor')[0].files;

    var checkbox = document.getElementById("form_checkbox_professor");
    if(checkbox.checked == false){
        document.getElementById("form_checkbox_professor").style.borderColor = "red";
        document.getElementById("professor-checkbox-invalid").style.display = "inline";
    }else {
        document.getElementById("form_checkbox_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-checkbox-invalid").style.display = "none";
    }

    var address = document.getElementById("form_address_professor").value;
    if(address.length == 0){
        document.getElementById("form_address_professor").style.borderColor = "red";
        document.getElementById("professor-address-invalid").style.display = "inline";
    }else {
        document.getElementById("form_address_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-address-invalid").style.display = "none";
    }

    var department = document.getElementById("form_department_professor").value;
    if(department.length == 0){
        document.getElementById("form_department_professor").style.borderColor = "red";
        document.getElementById("professor-department-invalid").style.display = "inline";
    }else {
        document.getElementById("form_department_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-department-invalid").style.display = "none";
    }

    var file1 = document.getElementById("form_file1_professor").value;
    if(file1.length == 0){
        document.getElementById("form_file1_professor_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file1_professor_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }

    var file2 = document.getElementById("form_file2_professor").value;
    if(file2.length == 0){
        document.getElementById("form_file2_professor_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file2_professor_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }

    var fname = document.getElementById("form_fname_professor").value;
    if (fname.length == 0) {
        document.getElementById("form_fname_professor").style.borderColor="red";
        document.getElementById("professor-fname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_fname_professor").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-fname-invalid").style.display = "none";
    }

    var sname = document.getElementById("form_sname_professor").value;
    if (sname.length == 0) {
        document.getElementById("form_sname_professor").style.borderColor="red";
        document.getElementById("professor-sname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_sname_professor").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-sname-invalid").style.display = "none";
    }

    var uname = document.getElementById("form_uname_professor").value;
    if (uname.length == 0) {
        document.getElementById("form_uname_professor").style.borderColor="red";
        document.getElementById("professor-uname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_uname_professor").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-uname-invalid").style.display = "none";
    }

    var pass = document.getElementById("form_pass_professor").value;
    if (pass.length == 0) {
        document.getElementById("form_pass_professor").style.borderColor="red";
        document.getElementById("professor-pass-invalid").style.display = "inline";
    }else {
        var regex = /^(?=[^A-Z\s]*[A-Z])(?=[^a-z\s]*[a-z])(?=[^\d\s]*\d)(?=\w*[\W_])\S{8,}$/;
        if (regex.test(pass) == false) {
            document.getElementById("form_pass_professor").style.borderColor="red";
            document.getElementById("professor-pass-invalid").innerHTML = "Password must have at least one uppercase, one numeric and one special character";
            document.getElementById("professor-pass-invalid").style.display = "inline";
            return false;
        }
    }

    var repass = document.getElementById("form_repass_professor").value;
    if(repass.length == 0){
        document.getElementById("form_repass_professor").style.borderColor="red";
        document.getElementById("professor-repass-invalid").style.display = "inline";
    }else {
        document.getElementById("form_repass_professor").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-repass-invalid").style.display = "none";
    }

    if (pass.length >= 8 && fname.length >= 2 && sname.length >= 1 && uname.length >= 4 && department.length != 0 && address.length != 0 && file1 != "" && file2 != ""
        && checkbox.checked == true) {
        if(pass != repass) {
            document.getElementById("professor-repass-invalid").innerHTML = "Passwords does not match.";
            document.getElementById("professor-repass-invalid").style.display = "inline";
            document.getElementById("professor-repass-valid").style.display = "none";
            document.getElementById("form_repass_professor").style.borderColor="red";
            document.getElementById("form_repass_professor").style.display="inline";
        }else {
            document.getElementById("professor-repass-invalid").style.display = "none";
            document.getElementById("form_repass_professor").style.borderColor="rgba(0, 0, 0, 0.2)";
            swal({
                title: "Create Account?",
                text: "Make sure everything is right before proceeding.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).
            then((ok)=>{
                if (ok) {
                                        swal({
                                          title: "Creating Account...",
                                          text: "This may take for a while.",
                                          icon: "/img/upload_loading_icon.gif",
                                          button: false,
                                          closeOnClickOutside: false,
                                          closeOnEsc: false,
                                        });
                                        var data = new FormData();
                                        data.append('form_fname', fname);
                                        data.append('form_sname', sname);
                                        data.append('form_mi', mi);
                                        data.append('form_department', department);
                                        data.append('form_address', address);
                                        data.append('form_uname', uname);
                                        data.append('form_pass', pass);
                                        data.append('form_repass', repass);
                                        data.append('form_file1', actualFile1[0]);
                                        data.append('form_file2', actualFile2[0]);
                                        $.ajax({
                                          url: '/php/registration_page_professor_function.php',
                                          type: 'post',
                                          data: data,
                                          contentType: false,
                                          processData: false,
                                          success: function(response){
                                            console.log(response);
                                            if(response == 'exist!'){
                                                swal({
                                                  title: "Registration Failed",
                                                  text: "File already exists!",
                                                  icon: "error",
                                                  button: true,
                                                });
                                            }else if(response == 'fake!'){
                                                swal({
                                                  title: "Registration Failed",
                                                  text: "Make sure you upload an image file!",
                                                  icon: "error",
                                                  button: true,
                                                });
                                            }else if(response == 'large'){
                                                swal({
                                                  title: "Registration Failed",
                                                  text: "File too large!",
                                                  icon: "error",
                                                  button: true,
                                                });
                                                }else if(response == 'large'){
                                                swal({
                                                  title: "Registration Failed",
                                                  text: "File too large!",
                                                  icon: "error",
                                                  button: true,
                                                });
                                            }else if(response == 'username!'){
                                                document.getElementById("form_uname_professor").style.borderColor="red";
                                                swal({
                                                    title: "Registration Failed",
                                                    text: "Username was already taken.",
                                                    icon: "error",
                                                    button: true,
                                                });
                                                document.getElementById("form_uname_professor").parentElement.className+=" was-validated";
                                            }else {
                                                swal({
                                                  title: "Registration Success!",
                                                  text: "Account successfully created,\nclick OK to return?",
                                                  icon: "success",
                                                  buttons: true,
                                                });
                                                document.getElementById("form_fname_professor").value = '';
                                                document.getElementById("form_sname_professor").value = '';
                                                document.getElementById("form_mi_professor").value = '';
                                                document.getElementById("form_file1_professor").value = '';
                                                document.getElementById("form_file2_professor").value = '';
                                                document.getElementById("form_department").value = '';
                                                document.getElementById("form_address_professor").value = '';
                                                document.getElementById("form_uname_professor").value = '';
                                                document.getElementById("form_pass_professor").value = '';
                                                document.getElementById("form_repass_professor").value = '';
                                                document.getElementById("form_checkbox_professor").checked = false;
                                                $('#form_file1_professor').next('.front').html('Choose file...');
                                                $('#form_file2_professor').next('.back').html('Choose file...');
                                                $("#create-professor_mc").modal('hide');
                                            }
                                            
                                          }
                                        });
                                      }else {
    swal.stopLoading();
    swal.close();
}
});
}
}
}
//onkey press professor
function professorFname(len) {
    var fname = document.getElementById("form_fname_professor").value;
    if(fname.length < len){
        document.getElementById("form_fname_professor").style.borderColor = "red";
        document.getElementById("professor-fname-invalid").innerHTML = "Must have 2 or more.";
        document.getElementById("professor-fname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_fname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-fname-invalid").style.display = "none";
    }
    if (fname.length == 0) {
        document.getElementById("form_fname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-fname-invalid").style.display = "none";
    }
}
function professorSname(len) {
    var sname = document.getElementById("form_sname_professor").value;
    if(sname.length < len){
        document.getElementById("form_sname_professor").style.borderColor = "red";
        document.getElementById("professor-sname-invalid").innerHTML = "Must have 1 or more.";
        document.getElementById("professor-sname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_sname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-sname-invalid").style.display = "none";
    }
    if (sname.length == 0) {
        document.getElementById("form_sname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-sname-invalid").style.display = "none";
    }
}
function professorFile1() {
    var file1 = document.getElementById("form_file1_professor").value;
    if(file1.length == 0){
        document.getElementById("form_file1_professor_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file1_professor_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }
}
function professorFile2() {
    var file2 = document.getElementById("form_file2_professor").value;
    if(file2.length == 0){
        document.getElementById("form_file2_professor_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file2_professor_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }
}
function professorYear() {
    var year = document.getElementById("form_year_professor").value;
    if(year.length == 0){
        document.getElementById("form_year_professor").style.borderColor = "red";
        document.getElementById("professor-year-invalid").style.display = "inline";
    }else {
        document.getElementById("form_year_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-year-invalid").style.display = "none";
    }
}
function professorDepartment() {
    var department = document.getElementById("form_department_professor").value;
    if(department.length == 0){
        document.getElementById("form_department_professor").style.borderColor = "red";
        document.getElementById("professor-department-invalid").style.display = "inline";
    }else {
        document.getElementById("form_department_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-department-invalid").style.display = "none";
    }
}
function professorAddress() {
    var address = document.getElementById("form_address_professor").value;
    if(address.length == 0){
        document.getElementById("form_address_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-address-invalid").style.display = "none";
    }
}
function professorUname(len) {
    var uname = document.getElementById("form_uname_professor").value;
    if(uname.length < len){
        document.getElementById("form_uname_professor").style.borderColor = "red";
        document.getElementById("professor-uname-invalid").innerHTML = "Must have 4 or more.";
        document.getElementById("professor-uname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_uname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-uname-invalid").style.display = "none";
    }
    if (uname.length == 0) {
        document.getElementById("form_uname_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-uname-invalid").style.display = "none";
    }
}
function professorPass(len) {
    var pass = document.getElementById("form_pass_professor").value;
    if(pass.length < len){
        document.getElementById("form_pass_professor").style.borderColor = "red";
        document.getElementById("professor-pass-invalid").innerHTML = "Must have 8 or more.";
        document.getElementById("professor-pass-invalid").style.display = "inline";
    }else {
            var regex = /^(?=[^A-Z\s]*[A-Z])(?=[^a-z\s]*[a-z])(?=[^\d\s]*\d)(?=\w*[\W_])\S{8,}$/;
            if (regex.test(pass) == false) {
                document.getElementById("form_pass_professor").style.borderColor="red";
                document.getElementById("professor-pass-invalid").innerHTML = "Password must have at least one uppercase, one numeric and one special character";
                document.getElementById("professor-pass-invalid").style.display = "inline";
                return false;
            }else {
                document.getElementById("form_pass_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
                document.getElementById("professor-pass-invalid").style.display = "none";
            }
    }
    if (pass.lenth == 0) {
        document.getElementById("form_pass_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-pass-invalid").style.display = "none";
    }
}
function professorRepass() {
    var repass = document.getElementById("form_repass_professor").value;
    var pass = document.getElementById("form_pass_professor").value;
    if(repass != pass){
        document.getElementById("form_repass_professor").style.borderColor = "red";
        document.getElementById("professor-repass-invalid").innerHTML = "Password does not match.";
        document.getElementById("professor-repass-invalid").style.display = "inline";
    }else {
        document.getElementById("form_repass_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-repass-invalid").style.display = "none";
    }
    if (repass.length == 0) {
        document.getElementById("form_repass_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-repass-invalid").style.display = "none";
    }
}
function professorCheckbox() {
    var checkbox = document.getElementById("form_checkbox_professor");
    if(checkbox.checked == false){
        document.getElementById("professor-checkbox-invalid").style.display = "inline";
    }else {
        document.getElementById("form_checkbox_professor").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("professor-checkbox-invalid").style.display = "none";
    }
}