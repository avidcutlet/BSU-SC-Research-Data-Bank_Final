<?php 
require "server.php";
if (isset($_POST['query'])) {
	$search = $_POST['query'];
	$sql_count = " SELECT * 
	from researchstudy_table 
	where Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
	$count_result = mysqli_query($conn, $sql_count);
?>
<?php if (mysqli_num_rows($count_result) == 0): ?>
	<?php echo ''; ?>
<?php endif ?>
<?php if (mysqli_num_rows($count_result)): ?>
	<ul id="tab-list" class="nav nav-pills nav-justified" role="tablist">
              <li class="nav-item">
                <a class="nav-link fa fa-star active" data-toggle="pill" href="#mostRelevant">Relevant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fa fa-star" data-toggle="pill" href="#mostReads">Read</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fa fa-star" data-toggle="pill" href="#mostDownloads">Download</a>
              </li>
            
            </ul>
<?php endif ?>
<?php } ?>