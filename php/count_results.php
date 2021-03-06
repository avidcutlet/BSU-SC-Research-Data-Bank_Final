<?php
require "server.php";
if (isset($_POST['query'])) {
  $search = $_POST['query'];
}else{
  $search = false;
}
if (isset($_POST['adviser1'])) {
  $adviser1 = $_POST['adviser1'];
}else{
  $adviser1 = false;
}
if (isset($_POST['adviser2'])) {
  $adviser2 = $_POST['adviser2'];
}else{
  $adviser2 = false;
}
if (isset($_POST['adviser3'])) {
  $adviser3 = $_POST['adviser3'];
}else{
  $adviser3 = false;
}
if (isset($_POST['adviser4'])) {
  $adviser4 = $_POST['adviser4'];
}else{
  $adviser4 = false;
}
if (isset($_POST['adviser5'])) {
  $adviser5 = $_POST['adviser5'];
}else{
  $adviser5 = false;
}
if (isset($_POST['year1'])) {
  $year1 = $_POST['year1'];
}else{
  $year1 = false;
}
if (isset($_POST['year2'])) {
  $year2 = $_POST['year2'];
}else{
  $year2 = false;
}
if (isset($_POST['year3'])) {
  $year3 = $_POST['year3'];
}else{
  $year3 = false;
}
if (isset($_POST['year4'])) {
  $year4 = $_POST['year4'];
}else{
  $year4 = false;
}
if (isset($_POST['year5'])) {
  $year5 = $_POST['year5'];
}else{
  $year5 = false;
}
if (isset($_POST['course1'])) {
  $course1 = $_POST['course1'];
}else{
  $course1 = false;
}
if (isset($_POST['course2'])) {
  $course2 = $_POST['course2'];
}else{
  $course2 = false;
}
if (isset($_POST['course3'])) {
  $course3 = $_POST['course3'];
}else{
  $course3 = false;
}
if ($search != false && $adviser1 == false && $adviser2 == false && $adviser3 == false && $adviser4 == false && $adviser5 == false &&
$year1 == false && $year2 == false && $year3 == false && $year4 == false && $year5 == false && $course1 == false && $course2 == false && $course3 == false) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) && 
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') ";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

elseif ($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) ||
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) || 
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    OR (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    OR (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

else{
    $query = "SELECT * FROM researchstudy_table";
}
$result = mysqli_query($conn, $query);
?>
<p id="count-results"><?php echo mysqli_num_rows($result) ?> Results</p>