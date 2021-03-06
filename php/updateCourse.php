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
if ($search != false && 
  ($adviser1 == false && $adviser2 == false && $adviser3 == false && $adviser4 == false && $adviser5 == false) &&
  ($year1 == false && $year2 == false && $year3 == false && $year4 == false && $year5 == false)) {
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif ($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) &&
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)) {
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif ($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false)){
	$sql_course = "SELECT Course, COUNT(*) as 'Count' 
	FROM researchstudy_table
	WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
	AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5')
	GROUP BY Course
	ORDER BY 2 DESC, Course DESC LIMIT 5";
}

elseif($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)){
  $sql_course = "SELECT Course, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
  GROUP BY Course
  ORDER BY 2 DESC, Course DESC LIMIT 5";
}

else{
	$sql_course = "SELECT Course, COUNT(*) as 'Count' 
	FROM researchstudy_table
	GROUP BY Course
	ORDER BY 2 DESC, Course DESC LIMIT 5";
}
$course_result = mysqli_query($conn, $sql_course);
?>
<div id="courseCheckbox">
                  <hr>

                  <div class="mt-4">
                    <label>COURSE</label>
                  </div>
                  <?php if (mysqli_num_rows($course_result) > 0): ?>
                    <?php $course = array(); $course_count = array();?>
                    <?php $x = 0; $count = 0;?>
                    <?php while($row_course = mysqli_fetch_array($course_result)) { ?>
                        <?php $course[$x] = $row_course['Course']; $course_count[$count] = $row_course['Count']; $count++; $x++; ?>
                    <?php } ?>

                  <br>
                  <?php if ($count >= 1): ?>
                    <input onclick="researchFilter('course')" type="checkbox" name="filter_checkbox_course1" id="filter_checkbox_course1" value="<?php echo $course[0] ?>">
                    <label for="filter_checkbox_course1" id="filter_label_author1"><?php echo strtoupper($course[0]) ?>&nbsp;(<?php echo $course_count[0] ?>)</label>
                  <?php endif ?>
                  <br>
                  <?php if ($count >= 2): ?>
                  <div id="more_course" class="more_filter">
                    <input onclick="researchFilter('course')" type="checkbox" name="filter_checkbox_course2" id="filter_checkbox_course2" class="mb-3" value="<?php echo $course[1] ?>">
                    <label for="filter_checkbox_course2" id="filter_label_course2" class="mb-3"><?php echo strtoupper($course[1]) ?>&nbsp;(<?php echo $course_count[1] ?>)</label>
                    <br>
                    <?php if ($count >= 3): ?>  
                    <input onclick="researchFilter('course')" type="checkbox" name="filter_checkbox_course3" id="filter_checkbox_course3" value="<?php echo $course[2] ?>">
                    <label for="filter_checkbox_course3" id="filter_label_course3"><?php echo strtoupper($course[2]) ?>&nbsp;(<?php echo $course_count[2] ?>)</label>
                    <br>
                    <?php endif ?>
                  </div>      
                  <?php endif ?>
                  
                  <?php if ($count >= 2): ?>
                  <br>
                  <button type="button" class="btn btn-outline-primary" id="course_btn" onclick="seeFilter('course_btn', 'more_course')">See more</button>
                  <?php endif ?>
                </div>
                <?php endif ?>