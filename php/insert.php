<?php
include "server.php";
$fname = $_POST['form_fname'];
$lname = $_POST['form_sname'];
$mi = $_POST['form_mi'];
$username = $_POST['form_uname'];
$pass = $_POST['form_pass'];
$repass = $_POST['form_repass'];

$sql = "INSERT INTO admin_table (admin_fname, admin_lname, admin_mi, admin_username, admin_password, admin_rpassword)
VALUES ('$fname', '$lname', '$mi', '$username', MD5('$pass'), MD5('$repass') )";
if($fname != '' && $lname != '' && $username != '' && $pass != '' && $repass != ''){
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}else{
echo 'Fill up required forms !';
}

$conn->close();
?>
