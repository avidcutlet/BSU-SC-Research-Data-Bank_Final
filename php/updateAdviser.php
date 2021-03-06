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
	($year1 == false && $year2 == false && $year3 == false && $year4 == false && $year5 == false) && 
	($course1 == false && $course2 == false && $course3 == false)) {
    $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count'
	FROM researchstudy_table
	WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  GROUP BY Adviser
	ORDER BY 2 DESC, Adviser ASC LIMIT 5";
}

elseif($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year4 != false) &&
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";   
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)) {
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";    
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false) &&
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false)) {
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";   
}

elseif($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year4 != false) &&
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false)) {
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";   
}

elseif($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)){
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false)){
  $sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  GROUP BY Adviser
  ORDER BY 2 DESC, Adviser ASC LIMIT 5";
}

else{
	$sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
	FROM researchstudy_table
	GROUP BY Adviser
	ORDER BY 2 DESC, Adviser ASC LIMIT 5";
}
$adviser_result = mysqli_query($conn, $sql_adviser);
?>
<div id="adviserCheckbox">

                    <div class="mt-4">
                      <label>ADVISER</label>
                    </div>
                    <?php if (mysqli_num_rows($adviser_result) > 0): ?>
                        <?php $adviser = array(); $adviser_count = array();?>
                        <?php $x = 0; $count = 0;?>
                        <?php while($row_adviser = mysqli_fetch_array($adviser_result)) { ?>
                            <?php $adviser[$x] = $row_adviser['Adviser']; $adviser_count[$count] = $row_adviser['Count']; $count++; $x++; ?>
                        <?php } ?>
                    <br>
                    <?php if ($count >= 1): ?>
                      <input onclick="researchFilter('adviser')" value="<?php echo $adviser[0] ?>" type="checkbox" name="filter_checkbox_adviser1" id="filter_checkbox_adviser1">
                      <label for="filter_checkbox_adviser1" id="filter_label_adviser1"><?php echo $adviser[0]; ?>&nbsp;(<?php echo $adviser_count[0]; ?>)</label>
                    <?php endif ?>
                      <?php if ($count >= 2): ?>
                    <br>
                      <input onclick="researchFilter('adviser')" value="<?php echo $adviser[1] ?>" type="checkbox" name="filter_checkbox_adviser2" id="filter_checkbox_adviser2">
                      <label for="filter_checkbox_adviser2" id="filter_label_adviser2"><?php echo $adviser[1]; ?>&nbsp;(<?php echo $adviser_count[1]; ?>)</label>
                      <?php endif ?>
                      <?php if ($count >= 3): ?>
                    <br>
                      <input onclick="researchFilter('adviser')" value="<?php echo $adviser[2] ?>" type="checkbox" name="filter_checkbox_adviser3" id="filter_checkbox_adviser3">
                      <label for="filter_checkbox_adviser3" id="filter_label_adviser3"><?php echo $adviser[2]; ?>&nbsp;(<?php echo $adviser_count[2]; ?>)</label>
                    <br>
                      <?php endif ?>
                    <?php if ($count >= 4): ?>                            
                    <div id="more_adviser" class="more_filter">
                      <input onclick="researchFilter('adviser')" value="<?php echo $adviser[3] ?>" type="checkbox" name="filter_checkbox_adviser4" id="filter_checkbox_adviser4" class="mb-3">
                      <label for="filter_checkbox_adviser4" id="filter_label_adviser4" class="mb-3"><?php echo $adviser[3]; ?>&nbsp;(<?php echo $adviser_count[3]; ?>)</label>
                      <br>
                      <?php if ($count >= 5): ?>
                      <input onclick="researchFilter('adviser')" value="<?php echo $adviser[4] ?>" type="checkbox" name="filter_checkbox_adviser5" id="filter_checkbox_adviser5">
                      <label for="filter_checkbox_adviser4" id="filter_label_adviser5"><?php echo $adviser[4]; ?>&nbsp;(<?php echo $adviser_count[4]; ?>)</label>
                      <br>
                      <?php endif ?>
                    </div>          
                    <?php endif ?>
                    <?php endif ?>
                    
                    <?php if ($count >= 4): ?>
                    <br>
                    <button type="button" class="btn btn-outline-primary" id="adviser_btn" onclick="seeFilter('adviser_btn', 'more_adviser')">See more</button>
                        
                    <?php endif ?>
                  </div>