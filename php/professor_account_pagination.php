<?php

	// Connect database 
  require "header.php";

	require_once('server.php');

	$limit = 20;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}
  //update status of professor
  if (isset($_POST['verify_id_professor'])){
  $verify_id =  $_POST['verify_id_professor'];

  $sql = "UPDATE professor_table 
  SET professor_account_status='verified' 
  WHERE professor_id=$verify_id";
  $conn->query($sql);
  }

  //deny status
  if (isset($_POST['deny_id_professor'])){
    $deny_id =  $_POST['deny_id_professor'];

  $sql = "UPDATE professor_table 
  SET professor_account_status='denied' 
  WHERE professor_id=$deny_id";
  $conn->query($sql);
  }

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM researchstudy_table 
	ORDER BY Title ASC 
	LIMIT $offset, $limit";

	// this sql is for getting counts
	$sql_count = " SELECT * from researchstudy_table ";
	$count_result = mysqli_query($conn, $sql_count);

	$result = mysqli_query($conn, $query);

	$output = "";

//get status from filter
  if (isset($_POST['status'])) {
    $status = $_POST['status'];
  }else{
    $status = 'pending';
  }
  if (isset($_POST['statusTxt'])) {
      $statusTxt = $_POST['statusTxt'];
  }else{
    $statusTxt = 'Pending';
  }

  //order asc or desc
  if (isset($_POST['sort'])) {
      $sort = $_POST['sort'];
  }else{
    $sort = 'ASC';
  }
  if (isset($_POST['sortTxt'])) {
      $sortTxt = $_POST['sortTxt'];
  }else{
    $sortTxt = '';
  }
  if ($sortTxt == '') {
      $sortTxt = 'Ascending';
  }

  ?>
<div class="row mt-3">
                    <?php
                    if (isset($_POST['bsit']) && $_POST['bsit'] != '' || isset($_POST['educ']) && $_POST['educ'] != '' || isset($_POST['bm']) && $_POST['bm'] != '') {
                        $department1 = $_POST['bsit']; 
                        $department2 = $_POST['educ']; 
                        $department3 = $_POST['bm'];

                        $sql_professor = "SELECT * 
                        FROM professor_table 
                        WHERE professor_account_status = '$status'
                        AND (professor_department = '$department1'
                        OR professor_department = '$department2'
                        OR professor_department = '$department3')
                        ORDER BY professor_lname $sort
                        LIMIT $offset, $limit";
                        //this sql is for getting the number of results
                        $sql_count_professor = " SELECT * 
                        from professor_table 
                        WHERE professor_account_status = '$status'
                        AND (professor_department = '$department1'
                        OR professor_department = '$department2'
                        OR professor_department = '$department3')";
                        $sql = "SELECT * 
                            FROM professor_table
                            WHERE professor_account_status = '$status'
                            AND (professor_department = '$department1'
                            OR professor_department = '$department2'
                            OR professor_department = '$department3')";
                    }else {
                    $sql_professor = "SELECT * 
                    FROM professor_table
                    WHERE professor_account_status = '$status'
                    ORDER BY professor_lname $sort
                    LIMIT $offset, $limit";
                    
                    //this sql is for getting the number of results
                    $sql_count_professor = " SELECT * 
                    from professor_table 
                    where professor_account_status = '$status'";
                    // pagination pages
                    $sql = "SELECT * 
                    FROM professor_table
                    WHERE professor_account_status = '$status'";
                }


                    $records = mysqli_query($conn, $sql);
                    $totalRecords = mysqli_num_rows($records);
                    $totalPage = ceil($totalRecords/$limit);
                    $result_professor = $conn->query($sql_professor);
                    $count_result_professor = mysqli_query($conn, $sql_count_professor);
                    $number_pages_professor = ceil(mysqli_num_rows($count_result_professor) / $limit);
                    ?>

                    <!-- first column -->
                        <div class="col-sm-3">

                            <p><?php if (mysqli_num_rows($result_professor) > 0) {
                                    echo mysqli_num_rows($result_professor);
                                } else { 
                                    echo '0';
                                } ?> Results</p>
                            <hr>

                            <!-- Account Status -->

                            <label>Account Status:</label>
                            <div class="dropdown dropright">
                                <button class="btn btn-outline-secondary dropdown-toggle 
                                        mw-btn-150p" id="professorAccountStatus" data-toggle="dropdown"><?php echo $statusTxt; ?></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('professorAccountStatus', 'Pending', 'pending')">Pending</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('professorAccountStatus', 'Verified', 'verified')">Verified</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('professorAccountStatus', 'Denied', 'denied')">Denied</a>

                                </div>


                            </div>


                            <br>

                            <!-- Sort name -->
                        <?php if(mysqli_num_rows($result_professor) !== 0){ ?>
                            <label class="mt-2 mb-2">Sort Name:</label>


                            <div class="dropdown dropright">
                                <button class="btn btn-outline-secondary dropdown-toggle
                                        mw-btn-150p" id="professorSort" data-toggle="dropdown"><?php echo $sortTxt ?></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('professorSort', 'Ascending', 'ASC')">Ascending</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('professorSort', 'Descending', 'DESC')">Descending</a>

                                </div>

                            </div>

                            <br>
                        <?php } ?>

                            <!-- Filter Department -->
                            <label>Filter Department:</label>

                            <br>
                            <input type="checkbox" id="bsitProfessor" onclick="course('bsitProfessor')">
                            <label for="#bsit">IIT</label>

                            <br>
                            <input type="checkbox" id="educProfessor" onclick="course('educProfessor')">
                            <label for="#educ">EDUC</label>

                            <br>
                            <input type="checkbox" id="bmProfessor" onclick="course('bmProfessor')">
                            <label for="#bm">BM</label>

                            <hr class="sm-show">

                            <!-- first column -->
                        </div>

                        

                    <!-- second column -->
                    <div class="col">

                        

                        <!-- professor account starts here -->
                        <?php
                        if (mysqli_num_rows($result_professor) > 0) { ?>
                            <!-- output data of each row -->

                        <p>Professor <?php echo $statusTxt; ?>...</p>
                        <hr>
                         <?php   while ($row_professor = mysqli_fetch_array($result_professor)) {
                        ?>
                                <!-- Margin top added and col set to 5 -->
                                <div class="row mt-3" id="border-bg">
                                    <div class="col-sm-8">

                                        <button type="button" class="fa fa-trash btn btn-danger ml-0 mb-2" data-toggle="tooltip" title="Delete" 
                                        onclick="deleteAcc('professor_table', '<?php echo $row_professor['professor_username'] ?>', '/Professor_ID/', 'professor_id', <?php echo $row_professor['professor_id'] ?>,'professor')"></button>
                                        <p>Name: <?php echo $row_professor['professor_lname']; ?>, <?php echo $row_professor['professor_fname'] . ' ' . $row_professor['professor_mi']; ?></p>
                                        <p>Department: <?php echo $row_professor['professor_department']; ?></p>
                                        <p>Address: <?php echo $row_professor['professor_address'] ?>.</p>


                                    </div>

                                    <div class="col-sm-3">
                                        <!-- Display this for pending section -->
                                        <!-- if status is pending -->
                                        <?php if ($status == 'pending'): ?>
                                        <button onclick="denyProfessor(<?php echo $row_professor['professor_id']; ?>)" 
                                        class="btn btn-danger w-btn-acc sm-btn-font-size">Deny</button>

                                        <button onclick="verifyProfessor(<?php echo $row_professor['professor_id']; ?>)" 
                                        class="btn btn-primary w-btn-acc sm-btn-font-size">Verify</button>    
                                        <?php endif ?>

                                        <!-- if status is denied -->
                                        <?php if ($status == 'denied'): ?>
                                        <button onclick="verifyProfessor(<?php echo $row_professor['professor_id']; ?>)" 
                                        class="btn btn-primary w-btn-acc sm-btn-font-size">Verify</button>
                                        <?php endif ?>

                                        <!-- if status is verified -->
                                        <?php if ($status == 'verified'): ?>
                                        <button onclick="denyProfessor(<?php echo $row_professor['professor_id']; ?>)" 
                                        class="btn btn-danger w-btn-acc sm-btn-font-size">Deny</button>   
                                        <?php endif ?>


                                        <!-- display this for verified section -->
                                        <!--
                                <div class="alert alert-info">
                                    <strong>Verified!</strong>
                                </div>
                            -->
                                        <!-- Display this for denied section -->
                                        <!--

                                <div class="alert alert-danger">
                                    <strong>Denied!</strong>
                                </div>

                            -->
                                        <!-- ********************************* -->
                                        <!--  Remove the two <br> tags below   -->
                                        <!-- when pending section isn't in use -->
                                        <!-- ********************************* -->

                                        <br>
                                        <br>

                                        <!-- Identification card link modified -->
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="fa fa-id-card" data-target="#identification_card_<?php echo $row_professor['professor_id']; ?>" data-toggle="modal"> See identification card</a>
                                        </div>

                                        <!-- modal -->
                                        <div class="modal fade" id="identification_card_<?php echo $row_professor['professor_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- modal header -->
                                                    <div class="modal-header">
                                                        <button class="close fa fa-close" data-dismiss="modal"></button>
                                                    </div>

                                                    <div id="id_content_<?php echo $row_professor['professor_id']; ?>" class="carousel slide">

                                                        <!-- indicators -->
                                                        <ul class="carousel-indicators">
                                                            <li data-target="id_content_<?php echo $row_professor['professor_id']; ?>" data-slide-to="0" class="active"></li>
                                                            <li data-target="id_content_<?php echo $row_professor['professor_id']; ?>" data-slide-to="1"></li>
                                                        </ul>

                                                        <!-- slideshow -->
                                                        <div class="carousel-inner">

                                                            <div class="carousel-item active">
                                                                <img class="mw-100 mh-100" src="../Professor_ID/<?php echo str_replace(' ', '_', $row_professor['professor_username']); ?>/<?php echo $row_professor['professor_id_front']; ?>" alt="identification card front" width="500" height="500">
                                                            </div>

                                                            <div class="carousel-item">
                                                                <img class="mw-100 mh-100" src="../Professor_ID/<?php echo str_replace(' ', '_', $row_professor['professor_username']); ?>/<?php echo $row_professor['professor_id_back']; ?>" alt="identification card back" width="500" height="500">
                                                            </div>


                                                        </div>

                                                        <!-- left and right controls -->
                                                        <a class="carousel-control-prev" href="#id_content_<?php echo $row_professor['professor_id']; ?>" data-slide="prev">
                                                            <span class="fa fa-chevron-left" style="color: #000000"></span>
                                                        </a>

                                                        <a class="carousel-control-next" href="#id_content_<?php echo $row_professor['professor_id']; ?>" data-slide="next">
                                                            <span class="fa fa-chevron-right" style="color: #000000"></span>
                                                        </a>

                                                    </div>

                                                    <!-- footer -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>





                                    <!-- professor account ends here -->
                                </div>
                        <?php } ?>
                        <?php

                        //modified pagination
                          echo "<ul class='pagination justify-content-center mt-5'>";
                          for ($i=1; $i <= $totalPage; $i++) { 
                            if ($i == $page_no) {
                              $active = "active";
                              }else{
                                 $active = "";
                                 }
                               }
                                // Last page
                               if ($page_no == 1) {
                                echo "<li class='page-item'><a class='fa fa-angle-double-left page-link disabled' data-toggle='tooltip' title='Last page' id='1' last='$page_no' href=''></a></li>";
                               }else{
                                echo "<li class='page-item'><a class='fa fa-angle-double-left page-link' data-toggle='tooltip' title='Last page' id='1' last='$page_no' href=''></a></li>";
                               }

                                // Prev
                                if ($page_no == 1) {
                                    echo "<li class='page-item'><a class='fa fa-angle-left page-link disabled' data-toggle='tooltip' title='Next' id='1' limit='$page_no' href=''></a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='fa fa-angle-left page-link' data-toggle='tooltip' title='Next' id='".($page_no - 1)."' limit='$page_no' href=''></a></li>";
                                }

                                // Input
                                echo "<li class='page-item'><p class='px-3'>Page: <input id='inputPage' type='number' min='1' max='$totalPage' data-toggle='tooltip' title='Press Enter to go to page' value='$page_no'></input> of $totalPage</p></li>";

                                // Next
                                if ($page_no == $totalPage) {
                                    echo "<li class='page-item'><a class='fa fa-angle-right page-link disabled' data-toggle='tooltip' title='Next' id='$totalPage' limit='$totalPage' href=''></a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='fa fa-angle-right page-link' data-toggle='tooltip' title='Next' id='".($page_no + 1)."' limit='$totalPage' href=''></a></li>";
                                }

                                // Last page
                                if ($page_no == $totalPage) {
                                    echo "<li class='page-item'><a class='fa fa-angle-double-right page-link disabled' data-toggle='tooltip' title='Last page' id='$totalPage' last='$totalPage' href=''></a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='fa fa-angle-double-right page-link' data-toggle='tooltip' title='Last page' id='$totalPage' last='$totalPage' href=''></a></li>";
                                }
                                

                          echo "</ul>";
                          //end of pagination
                        ?>
                        <?php }else {
                            echo "No Results Found";
                        } ?>



                    <!-- row -->
                </div>