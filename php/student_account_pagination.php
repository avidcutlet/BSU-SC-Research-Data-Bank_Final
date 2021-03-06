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

	$offset = ($page_no-1) * $limit;

  //verify status student
  if (isset($_POST['verify_id'])){
    $verify_id =  $_POST['verify_id'];

  $sql = "UPDATE student_table 
  SET student_account_status='verified' 
  WHERE student_id=$verify_id";
  $conn->query($sql);
  }

  //deny status
  if (isset($_POST['deny_id'])){
    $deny_id =  $_POST['deny_id'];

  $sql = "UPDATE student_table 
  SET student_account_status='denied' 
  WHERE student_id=$deny_id";
  $conn->query($sql);
  }

  //move student to alumni
  if (isset($_POST['studentToAlumni_id'])){
    $studentToAlumni_id =  $_POST['studentToAlumni_id'];

  $sql = "UPDATE student_table 
  SET alumnus='yes' 
  WHERE student_id=$studentToAlumni_id";
  $conn->query($sql);
  }

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
                    <!-- Select sql for student -->
                    <?php
                    if (isset($_POST['bsit']) && $_POST['bsit'] != '' || isset($_POST['educ']) && $_POST['educ'] != '' || isset($_POST['bm']) && $_POST['bm'] != '') {
                    	$course1 = $_POST['bsit']; 
                        $course2 = $_POST['educ']; 
                        $course3 = $_POST['bm'];

                        $sql_student = "SELECT * 
                        FROM student_table 
                        WHERE (student_account_status = '$status'
                        AND alumnus = 'no')
                        AND (student_course = '$course1'
                        OR student_course = '$course2'
                        OR student_course = '$course3')
                        ORDER BY student_lname $sort
                        LIMIT $offset, $limit";
                        //this sql is for getting the number of results
                        $sql_count_student = " SELECT * 
                        from student_table 
                        WHERE (student_account_status = '$status'
                        AND alumnus = 'no')
                        AND (student_course = '$course1'
                        OR student_course = '$course2'
                        OR student_course = '$course3')";
                        $sql = "SELECT * 
                            FROM student_table
                            WHERE (student_account_status = '$status'
	                        AND alumnus = 'no')
	                        AND (student_course = '$course1'
	                        OR student_course = '$course2'
	                        OR student_course = '$course3')";
                    }else {
                    $sql_student = "SELECT * 
                    FROM student_table 
                    WHERE student_account_status = '$status'
                    AND alumnus = 'no'
                    ORDER BY student_lname $sort
                    LIMIT $offset, $limit";
                    
                    //this sql is for getting the number of results
                    $sql_count_student = " SELECT * 
                    from student_table 
                    where student_account_status = '$status'";
                    //pagination page sql
                    $sql = "SELECT * 
                        FROM student_table
                        WHERE student_account_status = '$status'
                        AND alumnus = 'no'";
                    }
                        
                    $result_student = $conn->query($sql_student);
                    $records = mysqli_query($conn, $sql);
                    $totalRecords = mysqli_num_rows($records);
                    $totalPage = ceil($totalRecords/$limit);
                    $count_result_student = mysqli_query($conn, $sql_count_student);
                    $number_pages_student = ceil(mysqli_num_rows($count_result_student) / $limit);

                    ?>
                    <!-- first column -->
                        <div class="col-sm-3">

                            <p><?php if (mysqli_num_rows($result_student) > 0) { 
                            echo mysqli_num_rows($result_student);
                            } else {
                                echo '0';
                            } ?> Results</p>
                            <hr>

                            <!-- Account Status -->
                            <label>Account Status:</label>
                            <div class="dropdown dropright">
                                <button class="btn btn-outline-secondary dropdown-toggle 
                                        mw-btn-150p" id="studentAccountStatus" data-toggle="dropdown"><?php echo $statusTxt; ?></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('studentAccountStatus', 'Pending', 'pending')">Pending</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('studentAccountStatus', 'Verified', 'verified')">Verified</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('studentAccountStatus', 'Denied', 'denied')">Denied</a>

                                </div>


                            </div>


                            <br>

                            <!-- Sort name -->
                        <?php if(mysqli_num_rows($result_student) !== 0){ ?>
                            <label class="mt-2 mb-2">Sort Name:</label>


                            <div class="dropdown dropright">
                                <button class="btn btn-outline-secondary dropdown-toggle
                                        mw-btn-150p" id="studentSort" data-toggle="dropdown"><?php echo $sortTxt ?></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('studentSort', 'Ascending', 'ASC')">Ascending</a>

                                    <a class="dropdown-item" type="button" onclick="changeBtnTxt('studentSort', 'Descending', 'DESC')">Descending</a>

                                </div>

                            </div>

                            <br>
                        <?php }else { echo ''; } ?>

                            <!-- Filter Course -->
                            <label>Filter Course:</label>

                            <br>
                            <input type="checkbox" id="bsitStudent" onclick="course('bsitStudent')">
                            <label for="#bsit">BSIT</label>

                            <br>
                            <input type="checkbox" id="educStudent" onclick="course('educStudent')">
                            <label for="#educ">EDUC</label>

                            <br>
                            <input type="checkbox" id="bmStudent" onclick="course('bmStudent')">
                            <label for="#bm">BM</label>

                        
                            <hr class="sm-show">

                            <!-- first column -->
                        </div>

                        

                    <!-- second column -->
                    <div class="col">
                        <?php
                        if (mysqli_num_rows($result_student) > 0) { ?>
                            <p>Student <?php echo $statusTxt ?>...</p>
                            <hr>

                        <?php while ($row_student = mysqli_fetch_array($result_student)) { ?>

                        

                        <!-- student account starts here -->
                                <!-- Margin top added and col set to 5 -->
                                <div class="row mt-3" id="border-bg">
                                    <div class="col-sm-8">
                                        <!-- delete and add to alumni button -->
                                        <!-- addToAlumni & deleteAcc on verifyAccount.js -->
                                        <div class="row ml-0 mb-2">
                                            <button type="button" class="fa fa-trash btn btn-danger" data-toggle="tooltip" title="Delete" 
                                            onclick="deleteAcc('student_table','<?php echo $row_student['student_username'] ?>','/Student_ID/','student_id',<?php echo $row_student['student_id'] ?>,'student')"></button>
                                            <span>&ThickSpace;</span>
                                            <button type="button" class="fa fa-graduation-cap btn btn-warning" data-toggle="tooltip" title="Move student to alumni" 
                                            onclick="addToAlumni(<?php echo $row_student['student_id'] ?>)"></button>
                                        </div>


                                        <p>Name: <?php echo $row_student['student_lname']; ?>,
                                            <?php echo $row_student['student_fname'];  ?> 
                                            <?php echo $row_student['student_mi'] ?></p>
                                        <p>CYS: <?php echo $row_student['student_course']; ?></p>
                                        <p>Address: <?php echo $row_student['student_address'] ?></p>


                                    </div>

                                    <div class="col-sm-3">
                                        <!-- Display this for pending section -->
                                        <!-- if status is pending -->
                                        <?php if ($status == 'pending'): ?>
                                        <button onclick="denyStudent(<?php echo $row_student['student_id']; ?>, 'student')" 
                                        class="btn btn-danger w-btn-acc sm-btn-font-size">Deny</button>

                                        <button onclick="verifyStudent(<?php echo $row_student['student_id']; ?>, 'student')" 
                                        class="btn btn-primary w-btn-acc sm-btn-font-size">Verify</button>    
                                        <?php endif ?>

                                        <!-- if status is denied -->
                                        <?php if ($status == 'denied'): ?>
                                        <button onclick="verifyStudent(<?php echo $row_student['student_id']; ?>, 'student')" 
                                        class="btn btn-primary w-btn-acc sm-btn-font-size">Verify</button>
                                        <?php endif ?>

                                        <!-- if status is verified -->
                                        <?php if ($status == 'verified'): ?>
                                        <button onclick="denyStudent(<?php echo $row_student['student_id']; ?>, 'student')" 
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
                                            <a href="#" class="fa fa-id-card" data-target="#identification_card_<?php echo $row_student['student_id']; ?>" data-toggle="modal"> See identification card</a>
                                        </div>

                                        <!-- modal -->
                                        <div class="modal fade" id="identification_card_<?php echo $row_student['student_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- modal header -->
                                                    <div class="modal-header">
                                                        <button class="close fa fa-close" data-dismiss="modal"></button>
                                                    </div>

                                                    <div id="id_content_<?php echo $row_student['student_id']; ?>" class="carousel slide">

                                                        <!-- indicators -->
                                                        <ul class="carousel-indicators">
                                                            <li data-target="id_content_<?php echo $row_student['student_id']; ?>" data-slide-to="0" class="active"></li>
                                                            <li data-target="id_content_<?php echo $row_student['student_id']; ?>" data-slide-to="1"></li>
                                                        </ul>

                                                        <!-- slideshow -->
                                                        <div class="carousel-inner">

                                                            <div class="carousel-item active">
                                                                <img class="mw-100 mh-100" src="../Student_ID/<?php echo str_replace(' ', '_', $row_student['student_username']); ?>/<?php echo $row_student['student_id_front']; ?>" alt="identification card front" width="500" height="500">
                                                            </div>

                                                            <div class="carousel-item">
                                                                <img class="mw-100 mh-100" src="../Student_ID/<?php echo str_replace(' ', '_', $row_student['student_username']); ?>/<?php echo $row_student['student_id_back']; ?>" alt="identification card back" width="500" height="500">
                                                            </div>


                                                        </div>

                                                        <!-- left and right controls -->
                                                        <a class="carousel-control-prev" href="#id_content_<?php echo $row_student['student_id']; ?>" data-slide="prev">
                                                            <span class="fa fa-chevron-left" style="color: #000000"></span>
                                                        </a>

                                                        <a class="carousel-control-next" href="#id_content_<?php echo $row_student['student_id']; ?>" data-slide="next">
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





                                    <!-- student account ends here -->
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

                        <?php }else{
                            echo "No Results Found";
                        }
                            
                        ?>


                        <!-- second column -->
                    </div>



                    <!-- row -->
                </div>