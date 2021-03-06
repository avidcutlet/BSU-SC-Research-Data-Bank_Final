<?php
require "header.php";
include "server.php";
if (isset($_SESSION['user']) == 'Admin') {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Research | BSU-SC Research DB</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Font link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">

    <!-- Tag input -->
    <link rel="stylesheet" href="../github-tagsinput/tagify/dist/tagify.css">
    <script src="../github-tagsinput/tagify/dist/jQuery.tagify.min.js"></script>

    <!-- Other resources -->
    <link rel="stylesheet" href="../css/research_coordinator_style.css">
    <link rel="stylesheet" href="../css/responsive_style.css">
    <link rel="stylesheet" href="../css/jumbotron_style.css">
    <script src="../js/researchCoordinator_script.js"></script>


</head>

<body>

    <!-- Header -->

    <nav class="navbar navbar-expand-md navbar-light bg-light">

        <div class="container-fluid">

            <div>
                <div class="header-font">
                    <a class="navbar-brand" href="../css/research_coordinator_page.css">Research DB</a>
                </div>

                <div class="mt-n3">
                    <span class="navbar-text sm-hide">Bulacan State University - Sarmiento Campus</span>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapseNavbar">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <!-- change link -->
                        <a class="nav-link" href="research_coordinator_page.php">Home</a>

                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="about_page.php">About</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact_page.php">Contact</a>

                    </li>

                    <!-- Dropdown for Logged-in -->
                    <!--
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                data-toggle="dropdown">Webster~</a>

            <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item">Settings & privacy</a>
            <a href="#" class="dropdown-item">Help Guides</a>
            <a href="#" class="dropdown-item">Support Centre</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Sign out</a>
            </div>
        </li>
        -->

                    <!-- buttons for Log in and sign up -->

                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#signIn_mc">Sign in</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#create_mc">Create account</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <form id="logout" action="logout.php" method="post">
                                <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout').submit();">Logout</a>
                                <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" />
                            </form>
                        </li>
                    <?php } ?>


                </ul>
            </div>


        </div>
    </nav>
    </div>


    <!-- Modal for sign in -->
    <div class="modal fade" id="signIn_mc" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- modal header -->
                <div class="modal-header">
                    <h5 class="modal-title header-font">Someone is logging in...</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- modal body -->
                <div class="modal-body">

                    <form action="login_function.php" method="post" class="needs-validation
                                    mx-auto mb-3">


                        <!-- Forename field -->

                        <div class="form-group">
                            <label for="form_fname">Username:</label>

                            <input type="text" class="form-control" id="form_uname" placeholder="Username" name="form_uname" minlength="2" maxlength="30" required>

                        </div>

                        <!-- Password field -->


                        <div class="form-group mt-2">
                            <label for="form_pass">Passsword:</label>
                            <input type="password" name="form_pass" id="form_pass" placeholder="Password" class="form-control" maxlength="30" minlength="8" required>
                            <!-- Show password added -->
                    <div class="input-group-append">
                        <button type="button" class="input-group btn btn-outline-primary"
                                id="show_pass_student_btn"
                                onclick="showPassword('form_pass_student', 'show_pass_student_btn', 'show_pass_student_icon')">
                            <span id="show_pass_student_icon" class="fa fa-eye"></span>
                        </button>
                    </div>

                        </div>
                        <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" />


                        <!-- Checkbox -->


                        <div class="row">
                            <div class="form-group col">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </div>

                            <!-- Register btn -->
                            <div class="col d-flex justify-content-end">
                                <button name="login-submit" id="login-submit" type="button" class="btn btn-primary" onclick="login()">Login</button>
                            </div>

                        </div>

                        <span class="d-flex justify-content-center mt-3">Don't have an account yet?&MediumSpace;
                            <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#create_mc">Register here.</a>
                        </span>

                        <!-- just a freakin horizontal line -->
                        <hr class="bg-dark mt-4">

                        <span class="d-flex justify-content-center">
                            <a href="#">Forgot password?</a>
                        </span>

                    </form>
                </div>

                <!-- Form validation -->
                <script>
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Get the forms we want to add validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {

                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {

                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>


            </div>


        </div>
    </div>

    <!-- modal -->
    </div>

    <!-- Modal for creating an account -->
    <div class="modal fade" id="create_mc">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- modal header -->
                <div class="modal-header">
                    <h5 class="modal-title header-font">Create an account...</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- modal body -->
                <div class="modal-body">
                    <div class="row">
                        <!-- Student -->
                        <div class="col mt-n3 mb-n3 modal-hover modal-height
                                    d-flex align-items-center justify-content-center">

                            <a href="registration_page_student.php" class="stretched-link">Student</a>
                        </div>

                        <!-- Professor -->
                        <div class="col mt-n3 mb-n3 modal-hover modal-height
                                    d-flex align-items-center justify-content-center">

                            <a href="registration_page_professor.php" class="stretched-link">Professor</a>
                        </div>
                    </div>

                </div>

                <!-- modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-outline-danger sm-btn-font-size" data-dismiss="modal">Close</button>
                </div>

            </div>

            <!-- modal -->
        </div>
    </div>

    <!-- Greetings -->
    <div style="height: 80px;" id="greetings-bg" class="container-fluid
            pl-4 pt-5
            border border-primary
                border-left-0
                border-right-0">

    <?php if(isset($_SESSION['user_id'])) { ?>
        <h4 class="header-font text-right">Welcome <?php echo $_SESSION['lastname'] ?>!</h4>
    <?php }else{ ?>
        <h4 class="header-font text-right">Welcome Unidentified Sht. ?>!</h4>
    <?php } ?>


    </div>

    <!-- contains nav-tab and tab-content -->
    <div class="container-fluid">
        <div class="pt-3">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link sm-smaller-fs active" href="#overview">Overview</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="research" class="nav-link sm-smaller-fs dropdown-toggle" data-toggle="dropdown" href="#">Research</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item sm-smaller-fs" href="#researchUpload" onclick="changeBtnTxt('research', 'Append research')">Append research</a>
                        <a class="dropdown-item sm-smaller-fs" href="#researchStudyList" onclick="changeBtnTxt('research', 'View research')">View research</a>
                    </div>
                </li>

                <li class="nav-item dropdown">

                    <a id="accountBtn" class="nav-link sm-smaller-fs dropdown-toggle" data-toggle="dropdown" href="#">Accounts</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item sm-smaller-fs" href="#alumni" onclick="changeBtnTxt('accountBtn', 'Alumni')">Alumni</a>
                        <a class="dropdown-item sm-smaller-fs" href="#student" onclick="changeBtnTxt('accountBtn', 'Student')">Student</a>
                        <a class="dropdown-item sm-smaller-fs" href="#professor" onclick="changeBtnTxt('accountBtn', 'Professor')">Professor</a>
                        <a class="dropdown-item sm-smaller-fs" href="#admin" onclick="changeBtnTxt('accountBtn', 'Admin')">Admin</a>
                    </div>
                </li>

            </ul>

            


            <!-- padding -->
        </div>


        <!-- tab panes tab content -->
        <div class="tab-content">

            <!-- Overview tab -->
            <div id="overview" class="container tab-pane fade active show"><br>
                <h4>Overview</h4>
                <p>In this page, as a research coordinator, you can manage data. <br>You can manage research data and account, such as alumni, student, professor, and admin</p>

            </div>



            <!-- Research study upload tab -->
            <div id="researchUpload" class="container tab-pane fade"><br>
                <h4>Append Research Menu</h4>
                <p>You can upload research study by clicking the button below.</p>

                <button class="btn btn-outline-primary" href="#researchUpload_mc" data-toggle="modal" data-keyboard="false" data-backdrop="static">+ Append</button>

                <p id="tryResult" class="text-danger mt-3">Note: Once the information have been uploaded, it cannot be edited again.<br>Please be sure to check the information you provided before you upload, thank you.</p>


                <!-- Modal for uploading research -->
                <div class="modal fade" id="researchUpload_mc" role="dialog">
                    <div class="modal-dialog modal-dialog-scrollable">

                        <!-- Modal header -->
                        <div class="modal-content">
                            <div class="modal-title">

                                <div class="modal-header">
                                    <div class="modal-title header-font">Coordinator is uploading thesis...</div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                            </div>

                            <!-- Modal details -->

                            <div class="modal-body">
                                <!-- Make the title color black -->
                                <!-- Make the hover color blue -->


                                <form id="rs_upload_form" onsubmit="return false;"
                                class="mx-auto mb-3" novalidate>


                                    <!-- Note -->

                                    <p class="text-danger">Note: Once the information have been uploaded, it cannot be edited again.
                                        Please be sure to check the information you provided before you upload, thank you.
                                    </p>


                                    <!-- Title field -->

                                    <div class="form-group">
                                        <label for="form_title">Title:</label>

                                        <input type="text" class="form-control" id="form_title" placeholder="Title" 
                                        name="form_title" minlength="10" maxlength="255" required>
                                        <div id="research-title-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-title-invalid" class="valid-feedback"></div>

                                    </div>


                                    <!-- Author added -->
                                    <!-- Manage author count added -->
                                    <label for="form_author1_fname">Author:&ThickSpace;
                                        <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" title="Append author (maximum of 6)" onclick="appendAuthor()">+</button>
                                        <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Remove author (minimum of 1)" onclick="removeAuthor()">&ThinSpace;–&ThinSpace;</button>
                                    </label>

                                    <!-- Author field -->
                                    <div id="PET-author">
                                        <div class="form-row" id="author-set">
                                            
                                            <!-- Forename field -->

                                            <div class="form-group col-sm-5"> 

                                                <input type="text"
                                                        class="form-control"
                                                        placeholder="Forename"
                                                        name="form_author_fname"
                                                        minlength="2"
                                                        maxlength="30"
                                                        required>                    
                                                <div id="research-author-fname-valid" class="invalid-feedback">Please fill out this field.</div>
                                                <div id="research-author-fname-invalid" class="valid-feedback"></div>

                                            </div>

                                            <!-- Middle initial field -->

                                            <div class="form-group col-sm-2">

                                                <input type="text"
                                                        name="form_author_mi"
                                                        placeholder="M.I."
                                                        class="form-control"
                                                        maxlength="5">
                                                <div id="research-author-mi-valid" class="invalid-feedback">Please fill out this field.</div>
                                                <div id="research-author-mi-invalid" class="valid-feedback"></div>

                                            </div>

                                            <!-- Surname field -->

                                            <div class="form-group col-sm-5">

                                                <input type="text"
                                                        name="form_author_sname"
                                                        placeholder="Surname"
                                                        class="form-control"
                                                        maxlength="30"
                                                        minlength="1"
                                                        required>
                                                <div id="research-author-sname-valid" class="invalid-feedback">Please fill out this field.</div>
                                                <div id="research-author-sname-invalid" class="valid-feedback"></div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Adviser field modified-->

                                    <!-- Adviser field -->

                                    <label for="form_adviser">Adviser:</label>
                                    <div class="form-row">
                                            
                                            <!-- Forename field -->

                                            <div class="form-group col-sm-5"> 

                                                <input type="text"
                                                        class="form-control"
                                                        placeholder="Forename"
                                                        id="form_adviser_fname"
                                                        name="form_author_fname"
                                                        minlength="2"
                                                        maxlength="30"
                                                        required>
                                                
                                                <div id="research-adviser-valid" class="invalid-feedback">Please fill out this field.</div>
                                                <div id="research-adviser-invalid" class="valid-feedback"></div>                  

                                            </div>

                                            <!-- Middle initial field -->

                                            <div class="form-group col-sm-2">

                                                <input type="text"
                                                        id="form_adviser_mi"
                                                        name="form_author_mi"
                                                        placeholder="M.I."
                                                        class="form-control"
                                                        maxlength="5">

                                                <div id="research-adviser-mi-valid" class="invalid-feedback">Please fill out this field.</div>
                                                <div id="research-adviser-mi-invalid" class="valid-feedback"></div>

                                            </div>

                                            <!-- Surname field -->

                                            <div class="form-group col-sm-5">

                                                <input type="text"
                                                        name="form_adviser_sname"
                                                        placeholder="Surname"
                                                        id="form_adviser_sname"
                                                        class="form-control"
                                                        maxlength="30"
                                                        minlength="1"
                                                        required>

                                                    <div id="research-adviser-sname-valid" class="invalid-feedback">Please fill out this field.</div>
                                                    <div id="research-adviser-sname-invalid" class="valid-feedback"></div>
                                            </div>

                                        </div>


                                    <!-- Year level field -->

                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="form_year">Year:</label>

                                            <select name="form_year" id="form_year" class="form-control
                                                    select-picker
                                                    border-muted
                                                    needs-validation" required>

                                                <option value="">Choose year</option>
                                                <?php for ($year=2000; $year <= 2030; $year++) { 
                                                echo '<option value="'.$year.'">'.$year.'</option>';
                                                } ?>
                                            </select>
                                        <div id="research-year-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-year-invalid" class="valid-feedback"></div>


                                        </div>


                                        <!-- Course field -->


                                        <div class="form-group col">
                                            <label for="form_course">Course:</label>

                                            <select name="form_course" id="form_course" class="form-control
                                                        select-picker
                                                        border-muted
                                                        needs-validation" required>

                                                <option value="">Choose course</option>
                                                <option value="bsit">BSIT</option>
                                                <option value="educ">EDUC</option>
                                                <option value="bm">BM</option>
                                            </select>
                                        <div id="research-course-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-course-invalid" class="valid-feedback"></div>

                                        </div>
                                    </div>


                                    <!-- Keywords field -->
                                    <div class="form-group">

                                        <label for="form_keywords">Keywords:</label><br>
                                        <input type="text" name="basic" id="form_keywords" class="form-control tagify" required>
                                        <div id="research-keywords-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-keywords-invalid" class="valid-feedback"></div>


                                        <script data-name="basic" src="../js/tagsinput.js"></script>
                                    </div>



                                    <!-- Abstract field -->

                                    <div class="form-group mb-3">
                                        <label for="form_abstract">Abstract:</label>
                                        <textarea name="form_abstract" id="form_abstract" placeholder="Abstract" 
                                        class="form-control" style="min-height: 80px; max-height: 160px;" rows="5" minlength="10" 
                                        required></textarea>
                                        <div id="research-abstract-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-abstract-invalid" class="valid-feedback"></div>
                                    </div>

                                    <!-- File -->

                                    <div class="custom-file form-group">
                                        <label class="mb-4" for="form_file">File:</label>

                                        <input type="file" name="form_file" id="form_file" 
                                        class="custom-file-input form-control mt-5" accept="application/pdf" required>

                                        <label id="caseFile" for="form_file" class="custom-file-label mt-4">Choose file...</label>
                                        <div id="research-file-valid" class="invalid-feedback">Please fill out this field.</div>
                                        <div id="research-file-invalid" class="valid-feedback"></div>


                                        <!-- Script for adding the name of file to the label -->

                                        <script>
                                            $('#form_file').on('change', function(e) {
                                                // Get file name
                                                var fileName = e.target.files[0].name;

                                                // Replace the "Choose file..." label
                                                $(this).next('.custom-file-label').html(fileName);

                                            });
                                        </script>
                                    </div>



                                    <button type="submit" onclick="uploadVal();" 
                                    class="btn btn-outline-primary float-right">Submit</button>


                                </form>

                            </div>


                            <!-- modal header -->
                        </div>

                        <!-- modal dialog -->
                    </div>

                    <!-- modal -->
                </div>


                <!-- Research study upload tab -->
            </div>



            <!-- Research study list tab -->
            <div id="researchStudyList" class="container-fluid tab-pane fade">

                <!-- Search bar -->
                <div class="bg-muted
                        border border-primary
                            border-left-0
                            border-right-0">

                        <div class="input-group d-flex justify-content-center">

                            <div class="input-group-prepend py-4 w-100 mw-40rem">

                                    <button id="research-search-button" onclick="researchBtn()" 
                                    class="btn btn-outline-primary sm-btn-font-size">Search</button>
                                    <input type="hidden" name="page" value="<?php echo 1 ?>">

                                    <input id="rs-input" name="query" 
                                    class="form-control" type="text" autocomplete="off" required oninput="getWidthResearch()">
                                    <button type="reset" class="btn btn-default fa fa-remove">
                            </div>

                        </div>
                        <div id="menu-container" class="input-group sm-width l-width"></div>
                </div>
<?php

$sql_count = " SELECT * from researchstudy_table ";
$count_result = mysqli_query($conn, $sql_count);
//full list query
$fullListQuery = "SELECT * FROM researchstudy_table 
ORDER BY Title ASC ";
$fullList = mysqli_query($conn, $fullListQuery);
//adviser sql with count
$sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
FROM researchstudy_table
GROUP BY Adviser
ORDER BY 2 DESC, Adviser DESC LIMIT 5";
$adviser_result = mysqli_query($conn, $sql_adviser);
//year sql with count
$sql_year = "SELECT Year, COUNT(*) as 'Count' 
FROM researchstudy_table
GROUP BY Year
ORDER BY Year DESC LIMIT 5";
$year_result = mysqli_query($conn, $sql_year);
//course with count sql
$sql_course = "SELECT Course, COUNT(*) as 'Count' 
FROM researchstudy_table
GROUP BY Course
ORDER BY 2 DESC, Course DESC LIMIT 5";
$course_result = mysqli_query($conn, $sql_course);

?>
  <div class="row">

      <!-- first column -->
      <!-- sm-hide remove -->
      <div class="col-sm-3 pl-4 pt-4">

        <p id="count-results"><?php echo mysqli_num_rows($count_result) ?> Results</p><!-- results count -->
        <hr>
        <!-- Button list added -->
            <label>See List: </label>
            <button type="button" class="fa fa-file-text btn btn-outline-primary" data-toggle="modal" data-target="#seeList"></button>
            <div class="modal fade" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" id="seeList" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <!-- modal content -->
                <div class="modal-content">
                  <!-- modal header -->
                  <div class="modal-header">
                    <h4 class="header-font">Research Study List&ThickSpace;</h4>
                    <button type="button" onclick="exportFullListPdf()" class="fa fa-download btn btn-outline-primary" data-toggle="tooltip" title="Download research study list"></button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- modal and table added -->
                  <!-- modal body -->
                  <div class="modal-body">
                    <div class="table">
                      <table class="table table-bordered" id="fullListPdf">
                        <tbody>
                          <?php if (mysqli_num_rows($fullList) > 0): ?>
                                                <?php while ($row_fullList = mysqli_fetch_array($fullList)) { ?>
                                                  <tr class="first-border-top first-border-bottom">
                                                    <td class="font-weight-bold" colspan="5"><?php echo $row_fullList['Title'] ?></td>
                                                  </tr>
                                                  <?php for ($x = 1; $x <= 6; $x++) { ?>
                                                  <tr>
                                                    <td class="font-weight-bold  td-style">Author<?php echo $x ?></td><td><?php echo $row_fullList['Author'.$x];?></td>
                                                  </tr>
                                                  <?php } ?>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Year</td><td><?php echo $row_fullList['Year'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Course</td><td><?php echo $row_fullList['Course'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Adviser</td><td><?php echo $row_fullList['Adviser'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Keywords</td><td><?php echo $row_fullList['Keywords'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Date Uploaded</td><td><?php echo $row_fullList['Upload_Date'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Views</td><td><?php echo $row_fullList['Views'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Downloads</td><td><?php echo $row_fullList['Downloads'] ?></td>
                                                  </tr>
                                                  <tr class="last-border-bottom">
                                                    <td class="font-weight-bold td-style"># of searches</td><td><?php echo $row_fullList['Search'] ?></td>
                                                  </tr>
                                                <?php } ?>
                                              <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- modal body -->
                            </div>
                            <!-- modal dialog -->
                        </div>
                        <!-- modal fade -->
                    </div>
          <!-- Filter changed -->
                <!-- <div class="row"> -->
                    <!-- br for see list -->
                    <br>


                  <!-- Checkboxes for Adviser added -->
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

                    <?php if ($count >=4): ?>                            
                    <div id="more_adviser" class="more_filter">
                      <input onclick="researchFilter()" value="<?php echo $adviser[3] ?>" type="checkbox" name="filter_checkbox_adviser4" id="filter_checkbox_adviser4" class="mb-3">
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

                  <!-- Checkboxes for year added -->
                  <div id="yearCheckbox">
                    <hr>

                    <label class="mt-4">YEAR</label>
                    <br>
                    <?php if (mysqli_num_rows($year_result) > 0): ?>
                        <?php $year = array(); $year_count = array();?>
                        <?php $x = 0; $count = 0;?>
                        <?php while($row_year = mysqli_fetch_array($year_result)) { ?>
                            <?php $year[$x] = $row_year['Year']; $year_count[$count] = $row_year['Count']; $count++; $x++; ?>
                        <?php } ?>

                    <br>
                    <?php if ($count >= 1): ?>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year1" id="filter_checkbox_year1" value="<?php echo $year[0] ?>">
                      <label for="filter_checkbox_year1" id="filter_label_year1"><?php echo $year[0]; ?>&nbsp;(<?php echo $year_count[0]; ?>)</label>
                    <?php endif ?>
                    <?php if ($count >= 2): ?>
                    <br>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year2" id="filter_checkbox_year2" value="<?php echo $year[1] ?>">
                      <label for="filter_checkbox_year2" id="filter_label_year2"><?php echo $year[1]; ?>&nbsp;(<?php echo $year_count[1]; ?>)</label>
                        
                    <?php endif ?>
                    
                    <?php if ($count >= 3): ?>
                    <br>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year3" id="filter_checkbox_year3" value="<?php echo $year[2] ?>">
                      <label for="filter_checkbox_year3" id="filter_label_year3"><?php echo $year[2]; ?>&nbsp;(<?php echo $year_count[2]; ?>)</label>
                        
                    <?php endif ?>

                    <?php if ($count >=4): ?>
                    <div id="more_year" class="more_filter">
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year4" id="filter_checkbox_year4" class="mb-3" value="<?php echo $year[3] ?>">
                      <label for="filter_checkbox_year4" id="filter_label_year4" class="mb-3"><?php echo $year[3]; ?>&nbsp;(<?php echo $year_count[3]; ?>)</label>
                      <br>
                      <?php if ($count >= 5): ?>
                      
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year5" id="filter_checkbox_year5" value="<?php echo $year[4] ?>">
                      <label for="filter_checkbox_year4" id="filter_label_year5"><?php echo $year[4]; ?>&nbsp;(<?php echo $year_count[4]; ?>)</label>
                      <br>
                      <?php endif ?>
                    </div>
                        
                    <?php endif ?>
                    <?php endif ?>
                                    
                    <?php if ($count >= 4): ?>
                        
                    <button type="button" class="btn btn-outline-primary" id="year_btn" onclick="seeFilter('year_btn', 'more_year')">See more</button>
                    <?php endif ?>
                    <br>
                  </div>


                <!-- row -->
                <!-- </div> -->

                <!-- Checkboxes for Course added -->
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

                <script src="../js/moreFilter_function.js"></script>
    
                <br>

                <!-- Checkboxes removed -->
                <!-- select tag here -->


        <!-- hr added -->
        <hr>

        <!-- first column -->
      </div>
      
      <!-- Content -->
      <div class="col">

        <!-- sm-hide remove and change padding top to 3 -->

        <div class="d-flex align-items-center justify-content-center pt-3">


          <!-- Use the 'active class' to change the btn color -->
            <!-- btn-group change to nav -->
            <!-- nav-justied added and icon added -->
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

        </div>

        <!-- tab content for most relevant, most reads, and most downloads -->
        <div class="tab-content">
          <!-- Most relevant -->
          <div id="mostRelevant" class="tab-pane fade active show">
            <div id="relevant-content">
              <!-- content on most_relevant.php -->
            </div>          
          </div>

          <!-- Most reads tab -->
          <div id="mostReads" class="tab-pane fade">
            <div id="reads-content">
              <!-- content on most_reads.php -->
            </div>
          </div>

          <!-- Most downloads tabs -->
          <div id="mostDownloads" class="tab-pane fade">
            <div id="downloads-content">
              <!-- content on most_downloads.php -->
            </div>
          </div>
        </div>
      <!-- div for Content -->

      </div>
  <!-- div for row -->
  </div>

                <!-- Research study list tab -->
            </div>
            <!-- Alumni tab added -->

            <!-- Alumni tab -->
            <div id="alumni" class="tab-pane fade"><br>

                <!-- Search bar -->
                <div class="bg-muted
                            border border-primary
                            border-left-0
                            border-right-0">
                    <form action="research_coodinator_page.php" method="get" autocomplete="off">

                        <div class="input-group d-flex justify-content-center">

                            <div class="input-group-prepend py-4 w-100 mw-40rem">
                                <form action="#">

                                    <button class="btn btn-outline-primary sm-btn-font-size" type="submit">Search</button>
                                    <input type="hidden">

                                    <input required id="search-input" name="query" class="form-control" type="text">
                                    <button type="reset" class="btn btn-default fa fa-remove">
                                </form>
                            </div>

                        </div>
                    </form>
                </div>

                <div id="alumni-content">
                <!-- Main content student -->
                </div>

                <!-- End alumni tab -->
            </div>



            <!-- Student tab -->
            <div id="student" class="tab-pane fade"><br>

                <!-- Search bar -->
                <div class="bg-muted
                border border-primary
                    border-left-0
                    border-right-0">
                    <form action="research_coodinator_page.php" method="get" autocomplete="off">

                        <div class="input-group d-flex justify-content-center">

                            <div class="input-group-prepend py-4 w-100 mw-40rem">
                                <form action="#">

                                    <button class="btn btn-outline-primary sm-btn-font-size" type="submit">Search</button>
                                    <input type="hidden">

                                    <input required id="search-input" name="query" class="form-control" type="text">
                                    <button type="reset" class="btn btn-default fa fa-remove">
                                </form>
                            </div>

                        </div>
                    </form>
                </div>
                <div id="student-content">
                <!-- Main content student -->
                
                <!-- End of main content student -->
                </div>

                <!-- End student tab -->
            </div>



            <!-- Professor tab -->
            <div id="professor" class="tab-pane fade"><br>

                <!-- Search bar -->
                <div class="bg-muted
                border border-primary
                    border-left-0
                    border-right-0">
                    <form action="research_coodinator_page.php" method="get" autocomplete="off">

                        <div class="input-group d-flex justify-content-center">

                            <div class="input-group-prepend py-4 w-100 mw-40rem">
                                <form action="#">

                                    <button class="btn btn-outline-primary sm-btn-font-size" type="submit">Search</button>
                                    <input type="hidden">

                                    <input required id="search-input" name="query" class="form-control" type="text">
                                    <button type="reset" class="btn btn-default fa fa-remove">
                                </form>
                            </div>

                        </div>
                    </form>
                </div>

            <div id="professor-content">
                <!-- its inside professor_account_pagination.php -->
            </div>

                <!-- Professor tab -->
            </div>



            <!-- Admin tab -->
            <div id="admin" class="tab-pane fade"><br>

                <!-- Search bar -->
                <div class="bg-muted
                border border-primary
                    border-left-0
                    border-right-0">
                    <form action="research_coodinator_page.php" method="get" autocomplete="off">

                        <div class="input-group d-flex justify-content-center">

                            <div class="input-group-prepend py-4 w-100 mw-40rem">
                                <form action="#">

                                    <button class="btn btn-outline-primary sm-btn-font-size" type="submit">Search</button>
                                    <input type="hidden">

                                    <input required id="search-input" name="query" class="form-control" type="text">
                                    <button type="reset" class="btn btn-default fa fa-remove">
                                </form>
                            </div>

                        </div>
                    </form>
                </div>
                <div id="admin-content">
                    <!-- its inside admin_account_pagination.php -->
                </div>

                <!-- Admin tab -->
            </div>


            <!-- tab panes tab content -->
        </div>

        <!-- contains nav-tab and tab-content -->
    </div>


    <!-- Footer -->
    <div id="mt-20rem">
        <!-- Footer -->

  <footer class="border-top-2 pb-4">

    <div class="container">
      <div class="row">
        <div class="col-md-8 ft">
          <!-- data tooltip added -->
          <p style="margin-top: -1%">Copyright © 2020 Research DB. All rights reserved.<br>
            We use cookies to help provide and enhance our service and tailor content.<br>
            By continuing you, agree to our <a href="#" data-toggle="tooltip" title="Please bear with us, this link is still on-progress..">Cookies Settings</a>.</p><br>

          <div style="margin-top: -4%;">
            <a href="#" data-toggle="tooltip" title="Please bear with us, this link is still on-progress..">Copyright</a>
            <span class="px-3">|</span>

            <a href="#" data-toggle="tooltip" title="Please bear with us, this link is still on-progress..">Terms of Use</a>
            <span class="px-3">|</span>

            <a href="#" data-toggle="tooltip" title="Please bear with us, this link is still on-progress..">Privacy Policy</a>

          </div>
        </div>

        <div class="col-md-4 l-mt sm-mt">
          <span>Follow us on:</span><br>
          
          <!-- Follow us link fixed -->
          <a href="https://www.facebook.com/bulsuofficial" class="fa fa-facebook-official sl" data-toggle="tooltip" title="Go to our official facebook page"></a>
          <a href="#" class="fa fa-instagram sl px-3" data-toggle="tooltip" title="The instragam link is coming soon..."></a>
          <a href="#" class="fa fa-twitter-square sl" data-toggle="tooltip" title="The twitter link is coming soon..."></a>
        </div>

      </div>
    </div>

  </footer>
    </div>

    <!-- Form validation -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/rs_upload_page.js"></script>
    <script src="../js/researchCoordinator_script.js"></script>
    <script src="../js/admin_research_search.js"></script>
    <script src="../js/addCount.js"></script>
    <script src="../js/verifyAccount.js"></script>
    <script src="../js/registration_admin_script.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/readAbstract_function.js"></script>
    <script src="../js/pagination.js"></script>
    <script src="../js/needToLogin.js"></script>
    <script src="../js/manageAuthorCount_script.js"></script>
    <script src="../js/research_studies_filter.js"></script>
    <!-- Add script for managing author -->
    <script src="/js/showPassword.js"></script>

</body>

</html>
<?php } ?>