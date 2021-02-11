function createAdmin() {
    
    var fname = document.getElementById("form_fname_admin").value;
    var sname = document.getElementById("form_sname_admin").value;
    var uname = document.getElementById("form_uname_admin").value;
    var pass = document.getElementById("form_pass_admin").value;
    var repass = document.getElementById("form_repass_admin").value;
    var mi = document.getElementById("form_mi_admin").value;

        if (fname.length == 0) {
            document.getElementById("form_fname_admin").style.borderColor="red";
            document.getElementById("admin-forename-invalid").style.display = "inline";
        }else {
            document.getElementById("form_fname_admin").style.borderColor="green";
        }
            if (sname.length == 0) {
                document.getElementById("form_sname_admin").style.borderColor="red";
                document.getElementById("admin-surname-invalid").style.display = "inline";
            }else {
                document.getElementById("form_sname_admin").style.borderColor="green";
            }
                if (uname.length == 0) {
                    document.getElementById("form_uname_admin").style.borderColor="red";
                    document.getElementById("admin-username-invalid").style.display = "inline";
                }else {
                    document.getElementById("form_uname_admin").style.borderColor="green";
                }
                    if (pass.length == 0) {
                        document.getElementById("form_pass_admin").style.borderColor="red";
                        document.getElementById("admin-password-invalid").style.display = "inline";
                    }else {
                        document.getElementById("form_pass_admin").style.borderColor="green";
                    }if(repass.length == 0){
                        document.getElementById("form_repass_admin").style.borderColor="red";
                        document.getElementById("admin-repassword-invalid").style.display = "inline";
                    }else {
                        document.getElementById("form_repass_admin").style.borderColor="green";
                    }if (pass.length >= 8 && fname.length >= 2 && sname.length >= 1 && uname.length >= 4 && pass.length >= 8) {
                        if(pass != repass) {
                            document.getElementById("admin-repassword-invalid").innerHTML = "Passwords does not match.";
                            document.getElementById("admin-repassword-invalid").style.display = "inline";
                            document.getElementById("admin-repassword-valid").style.display = "none";
                            document.getElementById("form_repass_admin").style.borderColor="red";
                            document.getElementById("form_repass_admin").style.display="inline";
                        }else {
                            document.getElementById("admin-repassword-invalid").style.display = "none";
                            document.getElementById("form_repass_admin").style.borderColor="green";
                                swal({
                                    title: "Create Account?",
                                    text: "Make sure everything is right before proceeding.",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                  }).
                                then((ok)=>{
                                      if (ok) {
                                        var formData = new FormData();
                                        formData.append('fname',fname);
                                        formData.append('sname',sname);
                                        formData.append('mi',mi);
                                        formData.append('username',uname);
                                        formData.append('password',pass);
                                        formData.append('r_password',repass);
                                        formData.append('register','token');
                                        $.ajax({
                                            url: "registration_admin.php",
                                            type: 'post',
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            success: function(response){
                                                if(response == 'username!'){
                                                    swal({
                                                    title: "Registration Failed",
                                                    text: "Username was already taken.",
                                                    icon: "error",
                                                    button: true,
                                                });
                                                }else {
                                                    updateAdmin();
                                                    swal({
                                                        title: "Account Created!",
                                                        text: "Click Ok to return.",
                                                        icon: "success",
                                                        button: true,
                                                    });
                                                    var fname = '';
                                                    var sname = '';
                                                    var uname = '';
                                                    var pass = '';
                                                    var repass = '';
                                                    var mi = '';
                                                    $("#createAdmin_mc").modal("hide");
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
//update admin account after creation
function updateAdmin() {
    $(document).ready(function() {
                function loadData(page) {
                    $.ajax({
                        url: "admin_account_pagination.php",
                        type: "POST",
                        cache: false,
                        data: {
                            page_no: page
                        },
                        success: function(response) {
                            $("#admin-content").html(response);
                        }
                    });
                }
                loadData();

                // Pagination code
                $(document).on("click", ".pagination li a", function(e) {
                    e.preventDefault();
                    var pageId = $(this).attr("id");
                    loadData(pageId);
                });
            });
}
//onkey press
function adminFname(len) {
    var fname = document.getElementById("form_fname_admin").value;
    if(fname.length < len){
        document.getElementById("form_fname_admin").style.borderColor = "red";
        document.getElementById("admin-forename-invalid").innerHTML = "Must have 2 or more.";
        document.getElementById("admin-forename-invalid").style.display = "inline";
    }else {
        document.getElementById("form_fname_admin").style.borderColor = "green";
        document.getElementById("admin-forename-invalid").style.display = "none";
    }
}
function adminSname(len) {
    var sname = document.getElementById("form_sname_admin").value;
    if(sname.length < len){
        document.getElementById("form_sname_admin").style.borderColor = "red";
        document.getElementById("admin-surname-invalid").innerHTML = "Must have 2 or more.";
        document.getElementById("admin-surname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_sname_admin").style.borderColor = "green";
        document.getElementById("admin-surname-invalid").style.display = "none";
    }
}
function adminUname(len) {
    var uname = document.getElementById("form_uname_admin").value;
    if(uname.length < len){
        document.getElementById("form_uname_admin").style.borderColor = "red";
        document.getElementById("admin-username-invalid").innerHTML = "Must have 4 or more.";
        document.getElementById("admin-username-invalid").style.display = "inline";
    }else {
        document.getElementById("form_uname_admin").style.borderColor = "green";
        document.getElementById("admin-username-invalid").style.display = "none";
    }
}
function adminPass(len) {
    var pass = document.getElementById("form_pass_admin").value;
    if(pass.length < len){
        document.getElementById("form_pass_admin").style.borderColor = "red";
        document.getElementById("admin-password-invalid").innerHTML = "Must have 8 or more.";
        document.getElementById("admin-password-invalid").style.display = "inline";
    }else {
        document.getElementById("form_pass_admin").style.borderColor = "green";
        document.getElementById("admin-password-invalid").style.display = "none";
    }
}
function adminRepass() {
    var pass = document.getElementById("form_pass_admin").value;
    var repass = document.getElementById("form_repass_admin").value;
    if(pass != repass){
        document.getElementById("form_repass_admin").style.borderColor = "red";
        document.getElementById("admin-repassword-invalid").innerHTML = "Passwords does not match.";
        document.getElementById("admin-repassword-invalid").style.display = "inline";
    }else {
        document.getElementById("form_repass_admin").style.borderColor = "green";
        document.getElementById("admin-repassword-invalid").style.display = "none";
    }
}