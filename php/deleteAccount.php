<?php
require "server.php";
if (isset($_POST['id'])) {
	//id for database
	$id = $_POST['id'];
	//type of id student_id or professor_id
	$id_type = $_POST['id_type'];
	//table name from database professor_table or student_table
	//this is from deleteAcc() parameter
	$table = $_POST['table'];
	//username from database
	//I retrieve username as I used it as folder name
	//for storing student/professor ID
	$username = $_POST['username'];
	// sql to delete a record
	$sql = "DELETE FROM $table WHERE $id_type=$id";
	//Directory on where the folder is
	//this is from onclick function parameter
	$dir = $_POST['dir'];
	//directory on where the files are stored
	$userDir = 'public_html'.$dir.str_replace(' ', '_', $username.'/');
	//connection to ftp server
	$conn_id = ftp_connect('files.000webhost.com');
	//ftp server credentials
	$login_result = ftp_login($conn_id, 'bsusc-research', '@password1234');
	//list all files from $userDir
	$files = ftp_nlist($conn_id, $userDir.'*');
	//use for to show the files from ftp
	foreach ($files as $file) {
		//delete files from $userDir
		if(ftp_delete($conn_id, $file) === true){
			//after deleting files delete the folder
			if(ftp_rmdir($conn_id, $userDir) === true){
				//after deleting folder 
				//delete the user from database using sql execution
				if($conn->query($sql)===true){
					echo 'Account had been deleted!';
				}else{
					echo 'Error on deleting database account.';
				}
			}else{
				echo 'Error when deleting folder';
			}
		}else{
			echo 'Error when deleting files';
		}
	}
}
?>
<?php
if (isset($_POST['admin_id'])) {
	$id = $_POST['admin_id'];
	$sql = "DELETE FROM admin_table WHERE admin_id=$id";
	if($conn->query($sql)===true){
		echo 'Account had been deleted!';
	}else{
		echo 'Unknown Error!';
	}
}
?>