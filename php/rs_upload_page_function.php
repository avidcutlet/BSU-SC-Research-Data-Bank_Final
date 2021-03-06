<?php
require "header.php";
include "server.php";

  // message after insert
  $output = '';
  $title = $conn -> real_escape_string($_POST['title']);
  $abstract = $conn -> real_escape_string($_POST['abstract']);
  $year = $conn -> real_escape_string($_POST['year']);
  $course = $conn -> real_escape_string($_POST['course']);
  $keywords = $conn -> real_escape_string($_POST['keywords']);
  $adviser = $conn -> real_escape_string($_POST['adviser']);
  $date = date("M d, Y h:i:s A");

  if (isset($_POST['Author1'])) {
    $author1 = $_POST['Author1'];
  }else{
    $author1 = '';
  }
  if (isset($_POST['Author2'])) {
    $author2 = $_POST['Author2'];
  }else{
    $author2 = '';
  }
  if (isset($_POST['Author3'])) {
    $author3 = $_POST['Author3'];
  }else{
    $author3 = '';
  }
  if (isset($_POST['Author4'])) {
    $author4 = $_POST['Author4'];
  }else{
    $author4 = '';
  }
  if (isset($_POST['Author5'])) {
    $author5 = $_POST['Author5'];
  }else{
    $author5 = "";
  }
  if (isset($_POST['Author6'])) {
    $author6 = $_POST['Author6'];
  }else{
    $author6 = '';
  }

  $target_dir = "../Research_Studies/";//eto directory na ginawa mo sa folder
  $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));//eto naman  ext example .pdf
  $file = $title.'.'.$file_ext;
  $file = str_replace(' ', '_', $file);//replace spaces " " to _
  $uploadOk = 1;
  
  // Validations
  //   Check if file already exists
    if (file_exists($file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
  
    // Check file size
    if ($_FILES["file"]["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    $sql_select = "SELECT RS_ID FROM researchstudy_table";
    $result = $conn->query($sql_select);
    $row = $result->fetch_assoc();
    $currentID = $row['RS_ID'];
    $newID = $currentID + 1;

    $sql = "INSERT INTO researchstudy_table (Title, Abstract, Author1, Author2, Author3, Author4, Author5,
    Author6, File, Year, Course, Keywords, Adviser, Upload_Date)
    VALUES ('$title', '$abstract', '$author1', '$author2', '$author3', '$author4', '$author5', '$author6', '$file', '$year', '$course', '$keywords', '$adviser', '$date')";

    if ($conn->query($sql) === TRUE && $uploadOk === 1) {
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$file);
      $output = "Research had been sucessfully uploaded.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>