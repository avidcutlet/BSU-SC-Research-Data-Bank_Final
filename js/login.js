function login() {
	var username = $('#form_uname_login').val();
	var password = $('#form_pass_login').val();
	var redirect = $('#redirect_login').val();
	if (username.length == 0) {
		document.getElementById("form_uname_login").style.borderColor = "red";
	}
	if (password.length == 0) {
		document.getElementById("form_pass_login").style.borderColor = "red";
	}
	var data = new FormData();
	data.append('form_uname',username);
	data.append('form_pass',password);
	data.append('redirect',redirect);
	data.append('login-submit','token');
	if(username.length >= 4 && password.length >= 8){
		$.ajax({
			url: "/php/login_function.php",
			type: 'post',
			data: data,
			contentType: false,
			processData: false,
			success: function(response){
				swal({
					title: "Logging in...",
					icon: "/img/upload_loading_icon.gif",
					button: false,
					closeOnClickOutside: false,
					closeOnEsc: false
				});
					if(response === 'failed') {
						swal({
							title: "Login Failed!",
							icon: "error",
							text: "Username and Password does not match!",
							button: true,
						});
				}else if(response === 'admin') {
					location.assign("/php/research_coordinator_page.php");
				}else {
					location.assign(location.href);
				}
			}
		});
	}else {
		return false;
	}
}
function loginUname() {
	var username = $("#form_uname_login").val();
	if(username.length > 0){
		document.getElementById("form_uname_login").style.borderColor = "rgba(0, 0, 0, 0.2)";
	}else{
		document.getElementById("form_uname_login").style.borderColor = "red";
	}
	if(username.length == 0){
		document.getElementById("form_uname_login").style.borderColor = "rgba(0, 0, 0, 0.2)";
	}
}
function loginPass() {
	var password = $("#form_pass_login").val();
	if(password.length > 0){
		document.getElementById("form_pass_login").style.borderColor = "rgba(0, 0, 0, 0.2)";
	}else{
		document.getElementById("form_pass_login").style.borderColor = "red";
	}
	if(password.length == 0){
		document.getElementById("form_pass_login").style.borderColor = "rgba(0, 0, 0, 0.2)";
	}
}