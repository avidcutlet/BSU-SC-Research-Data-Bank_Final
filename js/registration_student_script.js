function submitValStudent() {
    
    var fname = document.getElementById("form_fname_student").value;
    var sname = document.getElementById("form_sname_student").value;
    var mi = document.getElementById("form_mi_student").value;
    var file1 = document.getElementById("form_file1_student").value;
    var file2 = document.getElementById("form_file2_student").value;
    var alumnus = document.getElementById("form_alumnus_student").value;
    var year = '';
    var alumnus = '';
    var course = document.getElementById("form_course_student").value;
    var address = document.getElementById("form_address_student").value;
    var uname = document.getElementById("form_uname_student").value;
    var pass = document.getElementById("form_pass_student").value;
    var repass = document.getElementById("form_repass_student").value;
    var checkbox = document.getElementById("form_checkbox_student");
    var actualFile1 = $('#form_file1_student')[0].files;
    var actualFile2 = $('#form_file2_student')[0].files;
    if(document.getElementById("form_alumnus_student").checked == true){
        alumnus = 'yes'
        year = 'none';
    }else {
        alumnus = 'no';
        year = document.getElementById("form_year_student").value;
        if(document.getElementById("form_year_student").value.length == 0){
            document.getElementById("form_year_student").style.borderColor = "red"
            document.getElementById("student-year-invalid").style.display = "inline";
        }else{
            document.getElementById("form_year_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
            document.getElementById("student-year-invalid").style.display = "none";
        }
    }
    if(checkbox.checked == false){
        document.getElementById("form_checkbox_student").style.borderColor = "red";
        document.getElementById("student-checkbox-invalid").style.display = "inline";
    }else {
        document.getElementById("form_checkbox_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-checkbox-invalid").style.display = "none";
    }
    if(address.length == 0){
        document.getElementById("form_address_student").style.borderColor = "red";
        document.getElementById("student-address-invalid").style.display = "inline";
    }else {
        document.getElementById("form_address_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-address-invalid").style.display = "none";
    }
    if(course.length == 0){
        document.getElementById("form_course_student").style.borderColor = "red";
        document.getElementById("student-course-invalid").style.display = "inline";
    }else {
        document.getElementById("form_course_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-course-invalid").style.display = "none";
    }
    if(file1.length == 0){
        document.getElementById("form_file1_student_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file1_student_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-file1-invalid").style.display = "none";
    }
    if(file2.length == 0){
        document.getElementById("form_file2_student_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file2_student_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-file2-invalid").style.display = "none";
    }
    if (fname.length == 0) {
        document.getElementById("form_fname_student").style.borderColor="red";
        document.getElementById("student-fname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_fname_student").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("student-fname-invalid").style.display = "none";
    }
    if (sname.length == 0) {
        document.getElementById("form_sname_student").style.borderColor="red";
        document.getElementById("student-sname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_sname_student").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("student-sname-invalid").style.display = "none";
    }
    if (uname.length == 0) {
        document.getElementById("form_uname_student").style.borderColor="red";
        document.getElementById("student-uname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_uname_student").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("student-uname-invalid").style.display = "none";
    }
    if (pass.length == 0) {
        document.getElementById("form_pass_student").style.borderColor="red";
        document.getElementById("student-pass-invalid").style.display = "inline";
    }else {
        document.getElementById("form_pass_student").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("student-pass-invalid").style.display = "none";
    }if(repass.length == 0){
        document.getElementById("form_repass_student").style.borderColor="red";
        document.getElementById("student-repass-invalid").style.display = "inline";
    }else {
        document.getElementById("form_repass_student").style.borderColor="rgba(0, 0, 0, 0.2)";
        document.getElementById("student-repass-invalid").style.display = "none";
    }if (pass.length >= 8 && fname.length >= 2 && sname.length >= 1 && uname.length >= 4 && course.length != 0 && address.length != 0 && file1 != "" && file2 != ""
        && checkbox.checked == true) {
        if(pass != repass) {
            document.getElementById("student-repass-invalid").innerHTML = "Passwords does not match.";
            document.getElementById("student-repass-invalid").style.display = "inline";
            document.getElementById("student-repass-valid").style.display = "none";
            document.getElementById("form_repass_student").style.borderColor="red";
            document.getElementById("form_repass_student").style.display="inline";
        }else {
            document.getElementById("student-repass-invalid").style.display = "none";
            document.getElementById("form_repass_student").style.borderColor="rgba(0, 0, 0, 0.2)";
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
                    data.append('form_year', year);
                    data.append('form_address', address);
                    data.append('form_course', course);
                    data.append('form_uname', uname);
                    data.append('form_pass', pass);
                    data.append('form_alumnus', alumnus);
                    data.append('form_repass', repass);
                    data.append('form_file1', actualFile1[0]);
                    data.append('form_file2', actualFile2[0]);
                    $.ajax({
                        url: '/php/registration_page_student_function.php',
                        type: 'post',
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(response){
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
                            }else if(response == 'large!'){
                                swal({
                                    title: "Registration Failed",
                                    text: "File too large!",
                                    icon: "error",
                                    button: true,
                                });
                            }else if(response == 'username!'){
                                swal({
                                    title: "Registration Failed",
                                    text: "Username was already taken.",
                                    icon: "error",
                                    button: true,
                                });;
                            }else{
                                swal({
                                    title: "Registration Success!",
                                    text: "Account successfully created,\nclick OK to return?",
                                    icon: "success",
                                    buttons: true,
                                });
                                document.getElementById("form_fname_student").style.borderColor = "none";
                                document.getElementById("form_sname_student").style.borderColor = "none";
                                document.getElementById("form_file1_student_case").style.borderColor = "none";
                                document.getElementById("form_file2_student_case").style.borderColor = "none";
                                document.getElementById("form_year_student").style.borderColor = "none";
                                document.getElementById("form_course_student").style.borderColor = "none";
                                document.getElementById("form_address_student").style.borderColor = "none";
                                document.getElementById("form_uname_student").style.borderColor = "none";
                                document.getElementById("form_pass_student").style.borderColor = "none";
                                document.getElementById("form_repass_student").style.borderColor = "none";
                                document.getElementById("form_fname_student").value = '';
                                document.getElementById("form_sname_student").value = '';
                                document.getElementById("form_mi_student").value = '';
                                document.getElementById("form_year_student").value = '';
                                document.getElementById("form_alumnus_student").checked = false;
                                var dots = document.getElementById("dotss");
                                var moreText = document.getElementById("more");
                                var btnText = document.getElementById("form_alumnus_student");
                                if (btnText.checked == true) {
                                    dots.style.display = "inline";
                                    moreText.style.display = "none";
                                } else {
                                    dots.style.display = "none";
                                    moreText.style.display = "inline";
                                }
                                document.getElementById("form_file1_student").value = '';
                                document.getElementById("form_file2_student").value = '';
                                document.getElementById("form_alumnus_student").value = '';
                                document.getElementById("form_course_student").value = '';
                                document.getElementById("form_address_student").value = '';
                                document.getElementById("form_uname_student").value = '';
                                document.getElementById("form_pass_student").value = '';
                                document.getElementById("form_repass_student").value = '';
                                document.getElementById("form_checkbox_student").checked = false;
                                $('#form_file1_student').next('.front').html('Choose file...');
                                $('#form_file2_student').next('.back').html('Choose file...');
                                $("#create-student_mc").modal('hide');
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
//onkey press student
function studentFname(len) {
    var fname = document.getElementById("form_fname_student").value;
    if(fname.length < len){
        document.getElementById("form_fname_student").style.borderColor = "red";
        document.getElementById("student-fname-invalid").innerHTML = "Must have 2 or more.";
        document.getElementById("student-fname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_fname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-fname-invalid").style.display = "none";
    }
    if (fname.length == 0) {
        document.getElementById("form_fname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-fname-invalid").style.display = "none";
    }
}
function studentSname(len) {
    var sname = document.getElementById("form_sname_student").value;
    if(sname.length < len){
        document.getElementById("form_sname_student").style.borderColor = "red";
        document.getElementById("student-sname-invalid").innerHTML = "Must have 1 or more.";
        document.getElementById("student-sname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_sname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-sname-invalid").style.display = "none";
    }
    if (sname.length == 0) {
        document.getElementById("form_sname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-sname-invalid").style.display = "none";
    }
}
function studentFile1() {
    var file1 = document.getElementById("form_file1_student").value;
    if(file1.length == 0){
        document.getElementById("form_file1_student_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file1_student_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }
}
function studentFile2() {
    var file2 = document.getElementById("form_file2_student").value;
    if(file2.length == 0){
        document.getElementById("form_file2_student_case").style.borderColor = "red";
    }else {
        document.getElementById("form_file2_student_case").style.borderColor = "rgba(0, 0, 0, 0.2)";
    }
}
function studentYear() {
    var year = document.getElementById("form_year_student").value;
    if(year.length == 0){
        document.getElementById("form_year_student").style.borderColor = "red";
        document.getElementById("student-year-invalid").style.display = "inline";
    }else {
        document.getElementById("form_year_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-year-invalid").style.display = "none";
    }
}
function studentCourse() {
    var course = document.getElementById("form_course_student").value;
    if(course.length == 0){
        document.getElementById("form_course_student").style.borderColor = "red";
        document.getElementById("student-course-invalid").style.display = "inline";
    }else {
        document.getElementById("form_course_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-course-invalid").style.display = "none";
    }
}
function studentAddress() {
    var address = document.getElementById("form_address_student").value;
    if(address.length == 0){
        document.getElementById("form_address_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-address-invalid").style.display = "none";
    }
}
function studentUname(len) {
    var uname = document.getElementById("form_uname_student").value;
    if(uname.length < len){
        document.getElementById("form_uname_student").style.borderColor = "red";
        document.getElementById("student-uname-invalid").innerHTML = "Must have 4 or more.";
        document.getElementById("student-uname-invalid").style.display = "inline";
    }else {
        document.getElementById("form_uname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-uname-invalid").style.display = "none";
    }
    if (uname.length == 0) {
        document.getElementById("form_uname_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-uname-invalid").style.display = "none";
    }
}
function studentPass(len) {
    var pass = document.getElementById("form_pass_student").value;
    if(pass.length < len){
        document.getElementById("form_pass_student").style.borderColor = "red";
        document.getElementById("student-pass-invalid").innerHTML = "Must have 8 or more.";
        document.getElementById("student-pass-invalid").style.display = "inline";
    }else {
            var regex = /^(?=[^A-Z\s]*[A-Z])(?=[^a-z\s]*[a-z])(?=[^\d\s]*\d)(?=\w*[\W_])\S{8,}$/;
            if (regex.test(pass) == false) {
                document.getElementById("form_pass_student").style.borderColor="red";
                document.getElementById("student-pass-invalid").innerHTML = "Password must have at least one uppercase, one numeric and one special character";
                document.getElementById("student-pass-invalid").style.display = "inline";
                return false;
            }else {
                document.getElementById("form_pass_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
                document.getElementById("student-pass-invalid").style.display = "none";
            }
    }
    if (pass.length == 0) {
        document.getElementById("form_pass_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-pass-invalid").style.display = "none";
    }
}
function studentRepass() {
    var repass = document.getElementById("form_repass_student").value;
    var pass = document.getElementById("form_pass_student").value;
    if(repass != pass){
        document.getElementById("form_repass_student").style.borderColor = "red";
        document.getElementById("student-repass-invalid").innerHTML = "Password does not match.";
        document.getElementById("student-repass-invalid").style.display = "inline";
    }else {
        document.getElementById("form_repass_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-repass-invalid").style.display = "none";
    }
    if (repass.length == 0) {
        document.getElementById("form_repass_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-repass-invalid").style.display = "none";   
    }
}
function studentCheckbox() {
    var checkbox = document.getElementById("form_checkbox_student");
    if(checkbox.checked == false){
        document.getElementById("student-checkbox-invalid").style.display = "inline";
    }else {
        document.getElementById("form_checkbox_student").style.borderColor = "rgba(0, 0, 0, 0.2)";
        document.getElementById("student-checkbox-invalid").style.display = "none";
    }
}