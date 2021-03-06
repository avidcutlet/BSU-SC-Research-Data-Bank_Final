<?php
require "server.php";
//select to get latest search count
if (isset($_POST['query'])) {
	$search = $_POST['query'];

	$sql = "UPDATE researchstudy_table SET Search=Search + 1
	where Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";

	if($conn->query($sql) && strlen($search) > 2){
		echo "success";
	}else{
		return false;
	}
}
$conn->close();
?>