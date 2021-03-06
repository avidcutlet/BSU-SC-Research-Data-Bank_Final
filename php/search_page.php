<?php
require "header.php";
include "server.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search | BSU-SC Research DB</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

  <!-- Other resources -->
  <!--<link rel="stylesheet" href="../css/query_style.css">-->
  <link rel="stylesheet" href="/css/query_style.css">
  <link rel="stylesheet" href="/css/responsive_style.css">
  <link rel="stylesheet" href="/css/autocomplete.css">

</head>

<body>


  <!-- navigator -->

  <div class="sticky-top">

    <nav class="navbar navbar-expand-md navbar-light bg-light">

      <div class="container-fluid">

        <div>
          <div class="header-font">
              <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'Admin'){ ?>
                <a class="navbar-brand" href="/php/research_coordinator_page.php">Research DB</a>              
              <?php }else{ ?>
                <a class="navbar-brand" href="../index.php">Research DB</a> 
              <?php } ?>
            </div>

            <div class="mt-n3">
              <span class="navbar-text sm-hide">Bulacan State University - Sarmiento Campus</span>
            </div>
          </div>

          <button class="navbar-toggler" type="button"
                  data-toggle="collapse" data-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="collapseNavbar">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'Admin'){ ?>
                  <a class="nav-link" href="/research_coordinator_page.php/index.php">Home</a>
                <?php }else{ ?>
                  <a class="nav-link" href="../index.php">Home</a>
                <?php } ?>
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



  <!-- Modal for creating an account -->
    <div class="modal fade" id="create_mc">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <!-- modal header -->
          <div class="modal-header">
            <h5 class="modal-title header-font">Create an account for...</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- modal body -->
          <div class="modal-body">
            <div class="row">


            <!-- Student -->            
              <div class="col mt-n3 mb-n3 modal-hover modal-height
                          d-flex align-items-center justify-content-center">

                    <a class="stretched-link" data-dismiss="modal" href="#" data-toggle="modal" data-target="#create-student_mc">Student</a>
              </div>

            <!-- Professor -->
              <div class="col mt-n3 mb-n3 modal-hover modal-height
                          d-flex align-items-center justify-content-center">
                
                  <a class="stretched-link" data-dismiss="modal" href="#" data-toggle="modal" data-target="#create-professor_mc">Professor</a>
              </div>
              
            </div>
          </div>

          <!-- modal footer -->
          <div class="modal-footer">
            <button class="btn btn-outline-danger sm-btn-font-size" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>

    <!-- modal -->
    </div>

    <!-- Modal for creating student account -->
    <div class="modal fade" id="create-student_mc">
      <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">

              <!-- modal header -->
              <div class="modal-header">

                  <h5 class="header-font" id="student_header_create">A student is registering...</h5>
                  <button class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- modal body -->
              <div class="modal-body">


                <form id="register_form_student" onsubmit="return false;" 
                        class="p-3" novalidate>


                <!-- Name -->    
                <div class="form-row">

                    <!-- Forename field -->

                    <div class="form-group col-sm-5 needs-validation">
                        <label for="form_fname_student">Forename:</label>

                        <input type="text"
                                class="form-control"
                                id="form_fname_student"
                                placeholder="Forename"
                                name="form_fname_student"
                                minlength="2"
                                maxlength="30"
                                required
                                oninput="studentFname(2)">
                                <div id="student-fname-invalid" class="invalid-feedback">Please fill out this field.</div>

                    </div>

                    <!-- Middle initial field -->

                    <div class="form-group col-sm-2 needs-validation">
                        <label for="form_mi_student">M.I.:</label>
                        <input type="text"
                                name="form_mi_student"
                                id="form_mi_student"
                                placeholder="M.I."
                                class="form-control"
                                maxlength="5">

                    </div>

                    <!-- Surname field -->

                    <div class="form-group col-sm-5 needs-validation">

                        <label for="form_sname_student">Surname:</label>
                        <input type="text"
                                name="form_sname_student"
                                id="form_sname_student"
                                placeholder="Surname"
                                class="form-control"
                                maxlength="30"
                                minlength="1"
                                required
                                oninput="studentSname(1)">
                                <div id="student-sname-invalid" class="invalid-feedback">Please fill out this field.</div>
                    </div>

                </div>

                <!-- Identification card -->

                <div class="custom-file form-group needs-validation">
                <label for="form_file1_student">Identification card:</label>

                    <!-- Front -->
                    <input type="file"
                            name="form_file1_student"
                            id="form_file1_student"
                            class="custom-file-input"
                            accept="image/*"
                            required
                            onchange="studentFile1()">
                    <label for="form_file1_student" id="form_file1_student_case" class="custom-file-label front mt-4">Front</label>

                    <!-- Script for adding the name of file to the label -->

                    <script>
                        $('#form_file1_student').on('change', function(e){
                            // Get file name
                            var fileName = e.target.files[0].name;

                            // Replace the "Choose file..." label
                            $(this).next('.front').html(fileName);
                        })


                    </script>                    
                </div>
                <div id="student-file1-invalid" class="invalid-feedback">Please fill out this field.</div>

                <!-- Back -->
                <div class="custom-file form-group needs-validation">

                    <input type="file"
                            name="form_file2_student"
                            id="form_file2_student"
                            class="custom-file-input"
                            accept="image/*"
                            required
                            onchange="studentFile2()">
                    <label for="form_file2_student" id="form_file2_student_case" class="custom-file-label back mt-2">Back</label>

                    <!-- Script for adding the name of file to the label -->

                    <script>
                        $('#form_file2_student').on('change', function(e){
                            // Get file name
                            var fileName = e.target.files[0].name;

                            // Replace the "Choose file..." label
                            $(this).next('.back').html(fileName);
                        })


                    </script>

                </div>
                <div id="student-file2-invalid" class="invalid-feedback">Please fill out this field.</div>

                <!-- Hide Year dropdown for alumnus -->
                <!-- Checkbox for alumnus -->
                <div class="form-group mt-4">

                    <input id="form_alumnus_student" name="form_alumnus_student" type="checkbox"
                            onclick="moreAlumnus()"> I am an Alumnus.</input>


                </div>

                <!-- Year level field -->

                <div class="row ml-1">
                    <span id="dotss"></span>
                    <div class="form-group mr-1 needs-validation" id="more">
                            <label for="form_year_student">Year level:</label>


                            <select name="form_year_student"
                                    id="form_year_student"
                                    class="form-control
                                            select-picker
                                            border-muted"
                                            oninput="studentYear()">

                                <option value="">Choose year level</option>
                                <option value="1st year">1st year</option>
                                <option value="2nd year">2nd year</option>
                                <option value="3rd year">3rd year</option>
                                <option value="4th year">4th year</option>
                            </select>
                            <div id="student-year-invalid" class="invalid-feedback">Please fill out this field.</div>

                    </div>


                    <!-- Course field -->


                    <div class="form-group needs-validation">
                            <label for="form_course_student">Course:</label>

                            <select name="form_course_student"
                                    id="form_course_student"
                                    class="form-control
                                            select-picker
                                            border-muted"
                                    required
                                    oninput="studentCourse()">

                                <option value="">Choose course</option>
                                <option value="bsit">BSIT</option>
                                <option value="educ">EDUC</option>
                                <option value="educ">BM</option>
                            </select>
                            <div id="student-course-invalid" class="invalid-feedback">Please fill out this field.</div>

                    </div>

                </div>


                <!-- Address field -->

                <div class="form-group needs-validation">
                    <label for="form_address_student">Address:</label>
                    <input type="text"
                            name="form_address_student"
                            id="form_address_student"
                            placeholder="Address"
                            class="form-control"
                            maxlength="200"
                            minlength="8"
                            required
                            oninput="studentAddress()">
                            <div id="student-address-invalid" class="invalid-feedback">Please fill out this field.</div>

                </div>


                <!-- Username -->

                <div class="form-group needs-validation">
                    <label for="form_uname_student">Username:</label>
                    <input type="text"
                            name="form_uname_student"
                            id="form_uname_student"
                            placeholder="Username"
                            class="form-control"
                            maxlength="200"
                            minlength="4"
                            required
                            oninput="studentUname(4)">
                                <div id="student-uname-invalid" class="invalid-feedback">Please fill out this field.</div>

                </div>


                <!-- Password field -->
                <label for="form_pass_student">Passsword:</label>

                <div class="input-group mb-3 needs-validation">
                    <input type="password"
                            name="form_pass_student"
                            id="form_pass_student"
                            placeholder="Password"
                            class="form-control"
                            maxlength="30"
                            minlength="8"
                            required
                            oninput="studentPass(8)">

                    <!-- Show password added -->
                    <div class="input-group-append">
                        <button type="button" class="input-group btn btn-outline-primary"
                                id="show_pass_student_btn"
                                onclick="showPassword('form_pass_student', 'show_pass_student_btn', 'show_pass_student_icon')">
                            <span id="show_pass_student_icon" class="fa fa-eye"></span>
                        </button>
                    </div>
                            <div id="student-pass-invalid" class="invalid-feedback">Please fill out this field.</div>

                </div>

                <!-- Retype password field -->
                <label for="form_repass_student">Retype password:</label>

                <div class="input-group mb-3 needs-validation">
                    <input type="password"
                            name="form_repass_student"
                            id="form_repass_student"
                            placeholder="Retype password"
                            class="form-control"
                            maxlength="30"
                            minlength="8"
                            required
                            oninput="studentRepass()">

                    <!-- Show password added -->
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-primary"
                                  id="show_repass_student_btn"
                                  onclick="showPassword('form_repass_student', 'show_repass_student_btn', 'show_repass_student_icon')">
                          <span id="show_repass_student_icon" class="fa fa-eye"></span>
                        </button>

                    </div>
                            <div id="student-repass-invalid" class="invalid-feedback">Please fill out this field.</div>

                </div>



                <!-- Checkbox for terms of service and privacy policy -->
                <div class="form-group">
                    <input id="form_checkbox_student" name="form_checkbox_student" type="checkbox" value="1" required oninput="studentCheckbox()">
                    <span>I accept the <a href="#">Terms of Service</a> & <a href="#">Privacy Policy</a>.</span>
                                <div id="student-checkbox-invalid" class="invalid-feedback">Check this checkbox to continue.</div>


                </div>

                <!-- Register btn -->
                <div>
                    <button type="submit" class="btn btn-primary" name="registerBtn" 
                    onclick="submitValStudent();">Register</button>

                </div>

                <span class="d-flex justify-content-center mt-3">Already have an account?
                <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#signIn_mc">&MediumSpace;Login here</a>.</span>                

                <hr>
                <p class="d-flex justify-content-center my-n3 pt-1">Register as a&MediumSpace;
                <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#create-professor_mc">professor
                </a>&MediumSpace;instead.</p>




                </form>
              </div>


              </div>

          </div>
      <!-- Modal for creating student account -->
    </div>

    <!-- Modal for creating professor account -->
    <div class="modal fade" id="create-professor_mc">
      <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">

              <!-- modal header -->
              <div class="modal-header">

                  <h5 class="header-font">A professor is registering...</h5>
                  <button class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- modal body -->
              <div class="modal-body">


                <form id="register_form_professor" onsubmit="return false;" class="p-3" novalidate="">

                        <div class="form-row">

                  <!-- Forename field -->

                  <div class="form-group col-sm-5 needs-validation">
                      <label for="form_fname_professor">Forename:</label>

                      <input type="text"
                              class="form-control"
                              id="form_fname_professor"
                              placeholder="Forename"
                              name="form_fname_professor"
                              minlength="2"
                              maxlength="30"
                              required
                              oninput="professorFname(2)">
                                <div id="professor-fname-invalid" class="invalid-feedback">Please fill out this field.</div>
                  </div>

                  <!-- Middle initial field -->

                  <div class="form-group col-sm-2 needs-validation">
                      <label for="form_mi_professor">M.I.:</label>
                      <input type="text"
                              name="form_mi_professor"
                              id="form_mi_professor"
                              placeholder="M.I."
                              class="form-control"
                              maxlength="5">                
                  </div>

                  <!-- Surname field -->


                  <div class="form-group col-sm-5 needs-validation">

                      <label for="form_sname_professor">Surname:</label>
                      <input type="text"
                              name="form_sname_professor"
                              id="form_sname_professor"
                              placeholder="Surname"
                              class="form-control"
                              maxlength="30"
                              minlength="1"
                              required
                              oninput="professorSname(1)">
                                <div id="professor-sname-invalid" class="invalid-feedback">Please fill out this field.</div>
                  </div>

              </div>

              <!-- Department field -->


              <div class="form-group needs-validation">
                      <label for="form_department_professor">Department:</label>

                      <select name="form_department_professor"
                              id="form_department_professor"
                              class="form-control
                                      select-picker
                                      border-muted"
                              required
                              onchange="professorDepartment()">

                          <option value="" required>Choose department</option>
                          <option value="BIT Department" required>IIT Department</option>
                          <option value="EDUC Department" required>EDUC Department</option>
                          <option value="BM Department" required>BM Department</option>
                      </select>
                                <div id="professor-department-invalid" class="invalid-feedback">Please fill out this field.</div>

              </div>

              <!-- Identification card -->

              <div class="custom-file form-group needs-validation">
              <label for="form_file1_professor">Identification card:</label>

                  <!-- Front -->
                  <input type="file"
                          name="form_file1_professor"
                          id="form_file1_professor"
                          class="custom-file-input"
                          accept="image/*"
                          required
                          onchange="professorFile1()">
                  <label for="form_file1_professor" id="form_file1_professor_case" class="custom-file-label front mt-4">Front</label>

                  <!-- Script for adding the name of file to the label -->

                  <script>
                      $('#form_file1_professor').on('change', function(e){
                        console.log(this);
                          // Get file name
                          var fileName = e.target.files[0].name;

                          // Replace the "Choose file..." label
                          $(this).next('.front').html(fileName);
                      })


                  </script>                    
              </div>

                  <!-- Back -->
                  <div class="custom-file form-group needs-validation">

                      <input type="file"
                              name="form_file2_professor"
                              id="form_file2_professor"
                              class="custom-file-input"
                              accept="image/*"
                              required
                              onchange="professorFile2()">
                      <label for="form_file2_professor" id="form_file2_professor_case" class="custom-file-label back mt-2">Back</label>

                      <!-- Script for adding the name of file to the label -->

                      <script>
                          $('#form_file2_professor').on('change', function(e){
                              // Get file name
                              var fileName = e.target.files[0].name;

                              // Replace the "Choose file..." label
                              $(this).next('.back').html(fileName);
                          })


                      </script>

                  </div>



              <!-- Address field -->

              <div class="form-group mt-3 needs-validation">
                  <label for="form_address_professor">Address:</label>
                  <input type="text"
                          name="form_address_professor"
                          id="form_address_professor"
                          placeholder="Address"
                          class="form-control"
                          maxlength="200"
                          minlength="8"
                          required
                          oninput="professorAddress()">
                                <div id="professor-address-invalid" class="invalid-feedback">Please fill out this field.</div>

              </div>


              <!-- Username -->

              <div class="form-group needs-validation">
                  <label for="form_uname_professor">Username:</label>
                  <input type="text"
                          name="form_uname_professor"
                          id="form_uname_professor"
                          placeholder="Username"
                          class="form-control"
                          maxlength="200"
                          minlength="4"
                          required
                          oninput="professorUname(4)">
                                <div id="professor-uname-invalid" class="invalid-feedback">Please fill out this field.</div>

              </div>


              <!-- Password field -->
              <label for="form_pass_professor">Passsword:</label>

              <div class="input-group mb-3 needs-validation">
                  <input type="password"
                          name="form_pass_professor"
                          id="form_pass_professor"
                          placeholder="Password"
                          class="form-control"
                          maxlength="30"
                          minlength="8"
                          required
                          oninput="professorPass(8)">

                  <!-- Show password added -->
                  <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary"
                            id="pass_prof_btn"
                            onclick="showPassword('form_pass_professor', 'pass_prof_btn', 'pass_prof_icon')">

                      <span id="pass_prof_icon" class="fa fa-eye"></span>
                    </button>
                  </div>
                          <div id="professor-pass-invalid" class="invalid-feedback">Please fill out this field.</div>

              </div>

              <!-- Retype password field -->
              <label for="form_repass_professor">Retype password:</label>

              <div class="input-group mb-3 needs-validation">
                  <input type="password"
                          name="form_repass_professor"
                          id="form_repass_professor"
                          placeholder="Retype password"
                          class="form-control"
                          maxlength="30"
                          minlength="8"
                          required
                          oninput="professorRepass()">

                  <!-- Show password added -->
                  <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary"
                            id="repass_prof_btn"
                            onclick="showPassword('form_repass_professor', 'repass_prof_btn', 'repass_prof_icon')">
                      <span id="repass_prof_icon" class="fa fa-eye"></span>
                    </button>
                  </div>
                          <div id="professor-repass-invalid" class="invalid-feedback">Please fill out this field.</div>


              </div>

              <!-- Checkbox -->
              <div class="form-group needs-validation">
                  <input id="form_checkbox_professor" name="form_checkbox_professor" type="checkbox" value="1" required onclick="professorCheckbox()">
                  <span>I accept the <a href="#">Terms of Service</a> & <a href="#">Privacy Policy</a>.</span>
                                <div id="professor-checkbox-invalid" class="invalid-feedback">Please fill out this field.</div>

              </div>

              <!-- Register btn -->
              <div>
                  <button type="submit" class="btn btn-primary"  name="registerBtn"
                  onclick="submitValProfessor();">Register</button>

              </div>

              <span class="d-flex justify-content-center mt-3">Already have an account?
              <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#signIn_mc">&MediumSpace;Login here</a>.</span>                

              <hr>
              <p class="d-flex justify-content-center my-n3 pt-1">Register as a&MediumSpace;
              <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#create-student_mc">student
              </a>&MediumSpace;instead.</p>


          </form>
              </div>


              </div>

          </div>
      <!-- Modal for creating professor account -->
    </div>

    <!-- Modal for sign in -->
    <div class="modal fade" id="signIn_mc">
      <div class="modal-dialog">
          <div class="modal-content">
                  
              <!-- modal header -->
              <div class="modal-header">
                  <h5 class="modal-title header-font">Someone is logging in...</h5>
                  <button class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- modal body -->
              <div class="modal-body">

                  <form id="login-form" onsubmit="return false;"
                          class="mx-auto mb-3" novalidate>
                      
                      
                      <!-- username field -->

                      <div class="form-group">
                          <label for="form_uname_login">Username:</label>
                          
                          <input type="text"
                                  class="form-control"
                                  id="form_uname_login"
                                  placeholder="Username"
                                  name="form_uname"
                                  minlength="4"
                                  maxlength="30"
                                  required
                                  oninput="loginUname()">


                      </div>

                      <!-- Password field -->
                      <label for="form_pass_login">Passsword:</label>

                      <div class="input-group mb-4 mt-2">
                          <input type="password"
                                  name="form_pass_login"
                                  id="form_pass_login"
                                  placeholder="Password"
                                  class="form-control"
                                  maxlength="30"
                                  minlength="8"
                                  required
                                  oninput="loginPass()">

                          <!-- Show password added -->
                          <div class="input-group-append">
                            <button type="button" class="btn btn-outline-primary"
                                    id="pass_login_btn"
                                    onclick="showPassword('form_pass_login', 'pass_login_btn', 'pass_login_icon')">
                              <span id="pass_login_icon" class="fa fa-eye"></span>
                            </button>
                          </div>

                      </div>
                      <input type="hidden" id="redirect" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" />

                      
                      <!-- Checkbox -->
                      
                      
                      <div class="row">

                          <!-- Register btn -->
                          <div class="col d-flex justify-content-end">
                              <button name="login-submit" id="login-submit" onclick="login()" 
                              type="submit" class="btn btn-primary">Login</button>
                          </div>
                      
                      </div>
                      
                      <!-- Register link fixed -->
                      <div class="row d-flex justify-content-center mt-3">
                        <p>Don't have an account yet?&ThickSpace;</p>
                        <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#create_mc">Register here.</a>
                      </div>

                      <!-- just a freakin horizontal line -->            
                      <hr class="bg-dark mt-4">

                      <span class="d-flex justify-content-center">
                          <a href="#">Forgot password?</a>
                      </span>

                  </form>
              </div>

      
              </div>

          </div>
    </div>

  </div>

  <!-- Search bar -->
  <div class="container-fluid
                bg-muted
                border border-primary
                    border-left-0
                    border-right-0">
    <form action="search_page.php" method="get" autocomplete="off" onsubmit="return false">
      <div class="input-group d-flex justify-content-center">
        <div class="input-group-prepend py-4 w-100 mw-40rem">
          <form action="#">
            <button id="research-search-button" onclick="researchBtn()" class="btn btn-outline-primary sm-btn-font-size">Search</button>
            <input type="hidden" name="page" value="<?php echo 1 ?>">
            <input id="rs-input" name="query" class="form-control" type="text" autocomplete="off" required oninput="getWidthResearch()">
            <button type="reset" class="btn btn-default fa fa-remove">
          </form>
        </div>
      </div>
    </form>
    <div id="menu-container" class="input-group sm-width l-width"></div>
  </div>

  <!-- Main content -->
  <div class="container-fluid">
<?php
if (isset($_POST['query'])) {
  $search = $_POST['query']; # code...
}else{
  $search = false;
}
// this sql is for getting counts
$sql_count = "SELECT * 
from researchstudy_table 
where Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
//adviser sql with count
$sql_adviser = "SELECT Adviser, COUNT(*) as 'Count' 
FROM researchstudy_table
WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
GROUP BY Adviser
ORDER BY 2 DESC, Adviser DESC LIMIT 5";
$adviser_result = mysqli_query($conn, $sql_adviser);
//year sql with count
$sql_year = "SELECT Year, COUNT(*) as 'Count' 
FROM researchstudy_table
WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
GROUP BY Year
ORDER BY Year DESC LIMIT 5";
$year_result = mysqli_query($conn, $sql_year);
//course with count sql
$sql_course = "SELECT Course, COUNT(*) as 'Count' 
FROM researchstudy_table
WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
GROUP BY Course
ORDER BY 2 DESC, Course DESC LIMIT 5";
$course_result = mysqli_query($conn, $sql_course);
$count_result = mysqli_query($conn, $sql_count);
?>
  <div class="row">

      <!-- first column -->
      <!-- sm-hide remove -->
      <div class="col-sm-3 pl-4 pt-4">

        <p id="count-results"><?php if (mysqli_num_rows($count_result) > 0) {
              echo mysqli_num_rows($count_result);
            } else {
              echo '0';
            } ?> Results</p><!-- results count -->
        <hr>

        <?php
        if (mysqli_num_rows($count_result) === 0) {
          echo '';
        } else { ?>
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

                    <?php if ($count >= 4): ?>                            
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
                      <br>
                    <?php endif ?>
                    <?php if ($count >= 2): ?>
                    
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year2" id="filter_checkbox_year2" value="<?php echo $year[1] ?>">
                      <label for="filter_checkbox_year2" id="filter_label_year2"><?php echo $year[1]; ?>&nbsp;(<?php echo $year_count[1]; ?>)</label>
                      <br>
                    <?php endif ?>
                    
                    <?php if ($count >= 3): ?>
                    
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year3" id="filter_checkbox_year3" value="<?php echo $year[2] ?>">
                      <label for="filter_checkbox_year3" id="filter_label_year3"><?php echo $year[2]; ?>&nbsp;(<?php echo $year_count[2]; ?>)</label>
                      <br>
                    <?php endif ?>

                    <?php if ($count >= 4): ?>
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
                  <?php if ($count >=1): ?>
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
                  <?php endif ?>
                  
                  <?php if ($count >= 1): ?>
                  <br>
                  <button type="button" class="btn btn-outline-primary" id="course_btn" onclick="seeFilter('course_btn', 'more_course')">See more</button>
                  <?php endif ?>
                </div>

                <script src="../js/moreFilter_function.js"></script>
    
                <br>

                <!-- Checkboxes removed -->
                <!-- select tag here -->


        <!-- hr added -->
        <hr>

        <?php } ?>

        <!-- first column -->
      </div>
      
      <!-- Content -->
      <div class="col">

        <!-- sm-hide remove and change padding top to 3 -->

        <div class="d-flex align-items-center justify-content-center pt-3">


          <!-- Use the 'active class' to change the btn color -->
          <?php if (mysqli_num_rows($count_result) > 0) { ?>
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
          <?php } else {
            echo '';
          } ?>

        </div>

        <!-- tab content for most relevant, most reads, and most downloads -->
        <div class="tab-content">
          <!-- Most relevant -->
          <div id="mostRelevant" class="tab-pane fade active show">
            <div id="relevant-content">
              <?php
              $limit = 10;
              if (isset($_POST['page_no'])) {
                  $page_no = $_POST['page_no'];
              }else{
                  $page_no = 1;
              }
              $offset = ($page_no-1) * $limit;

              if (isset($_POST['query'])) {
                  //research studies content
                  $search = $_POST['query'];
                  $query = "SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'
                  ORDER BY Title ASC 
                  LIMIT $offset, $limit";

                  // this sql is for getting counts
                  $sql_count = " SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
                  //pagination
                  $sql = "SELECT * 
                  FROM researchstudy_table
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
              }else{
                  $query = "SELECT * FROM researchstudy_table 
                  ORDER BY Title ASC 
                  LIMIT $offset, $limit";
                  // this sql is for getting counts
                  $sql_count = " SELECT * from researchstudy_table ";
                  //pagination
                  $sql = "SELECT * FROM researchstudy_table";
              }
              // $query = "SELECT * FROM researchstudy_table 
              // ORDER BY Title ASC 
              // LIMIT $offset, $limit";
              $result = mysqli_query($conn, $query);
              ?>
              <?php
                    if (mysqli_num_rows($result) > 0) {
                    echo '<hr class="mb-0">';
                      while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="cards hBg 
                        border border-left-0
                                        border-right-0
                                        border-top-0
                                        border-semilightblue">

                          <div class="card-body">


                            <!-- Research studies information -->
                            <div class="row">
                              <div class="col">
                                <h4 class="sm-body-font-size"><?php echo $row["Title"] ?></h4><!-- Research title -->
                                <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                <!-- Author name -->
                                <p>Authors:
                                    <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                    <?php if ($row['Author2'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author3'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author4'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author5'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author6'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                  </p>
                                    <?php endif ?>
                                <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>
                              
                              <!-- Abstract contraction -->
                              <?php if (strlen($row['Abstract']) < 250): ?>
                              <p>
                                <?php echo $row['Abstract']; ?>
                              </p>
                              <?php endif ?>
                              <?php if (strlen($row['Abstract']) >= 250): ?>
                              <p>
                                <?php echo substr($row['Abstract'], 0, 250) ?>
                                <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                                <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                                <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                                <a type="button" onclick="readAbstract('most_rlvnt_cModalContent_',<?php echo $row['RS_ID'] ?>)" 
                                  id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                              </p>
                              <?php endif ?>
                              <!-- end of abstract -->

                                <!-- Statistics for small media -->
                                <p id="miniStats_<?php echo $row['RS_ID'] ?>"><small class="sm-show-stat">
                                  <?php if ($row['Views'] === 0) {
                                    echo '0';} else {  echo $row['Views']; } ?> Views | 
                                    <?php if ($row['Downloads'] === 0) {  echo '0'; } else {  echo $row['Downloads']; } ?> Downloads
                                  </small></p>


                                <!-- show this when a user is logged in -->
                                              <?php if (isset($_SESSION['user_id'])) { ?>
                                                <!-- Pending status -->
                                                <?php if($_SESSION['status'] === "pending") { ?>
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php }else { ?>
                                                <!-- Verified status -->
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php } ?>
                                              <?php } else { ?>

                                                <!-- show this when user isn't logged in -->

                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                                              <?php } ?>



                                <!-- Modal -->
                                <div class="modal fade" id="most_rlvnt_cModalContent_<?php echo $row['RS_ID']; ?>" role="dialog">
                                  <div class="modal-dialog modal-dialog-scrollable">

                                    <!-- Modal header -->
                                    <div class="modal-content">
                                      <div class="modal-title">

                                        <div class="modal-header">
                                                        <div class="btn-group">
                                                          <!-- Download PDF (logged in)-->
                                                          <?php if (isset($_SESSION['user_id'])) { ?>
                                                            <!-- Pending status -->
                                                            <?php if($_SESSION['status'] === "pending") { ?>
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php }else { ?>
                                                            <!-- Verified status -->
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php } ?>
                                                          <?php } else { ?>
                                                            <!-- Download PDF -->
                                                            <button type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</button><!-- Download button -->

                                                            <!-- View PDF -->
                                                            <button type="submit" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary"> View PDF</button><!-- View button -->
                                                          <?php } ?>

                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      </div>

                                      </div>

                                      <!-- Modal details -->

                                      <div class="modal-body">
                                        <!-- Make the title color black -->
                                        <!-- Make the hover color blue -->

                                        <div class="cfont cs-2"><?php echo $row['Title'] ?></div><!-- research title -->
                                        <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                        <p>Authors:
                                        <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                        <?php if ($row['Author2'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author3'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author4'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author5'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author6'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                    </p>
                                        <?php endif ?><!-- author name -->
                                        <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>

                                        <hr class="bg-muted">

                                        <p class="text-uppercase">Abstract</p>

                                        <p><?php echo $row['Abstract'] ?></p><!-- research abstract -->

                                      </div>


                                    </div>
                                  </div>
                                </div>

                                <!-- Mini tab for short details
                                    This <a> tag represent the button for the whole research study -->

                                <a href="#most_rlvnt_cModalContent_<?php echo $row['RS_ID']; ?>" class="stretched-link" data-toggle="modal" data-backdrop="static"></a>
                              </div>

                              <!-- Statistics for large media -->

                              <div class="col-2 sm-hide-stat">
                                <div class=" pt-2 text-ash">
                                  <p id="viewCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Views'] === 0) {  echo '0';} else { echo $row['Views'];} ?>
                                    <br>Readers</small></p><!-- count of views -->

                                </div>

                                <div class="pt-2 text-ash">
                                  <p id="downloadCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Downloads'] === 0) { echo '0';} else { echo $row['Downloads'];} ?>
                                    <br>Downloads</small></p><!-- count of downloads -->
                                </div>


                              </div>

                            </div> <!-- End of research studies information -->


                          </div>



                      </div>
                      <?php
                        } ?>
                        <?php

                        $records = mysqli_query($conn, $sql);

                        $totalRecords = mysqli_num_rows($records);

                        $totalPage = ceil($totalRecords/$limit);

                        // Remove divs
                        echo "<ul class='pagination justify-content-center mt-5'>";

                        for ($i=1; $i <= $totalPage; $i++) { 
                          if ($i == $page_no) {
                          $active = "active";
                          }else{
                          $active = "";
                          }


                          }
                           
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

                      <?php } else {
                        echo "No Results Found";
                      } ?>

                      <!-- The whole research study details ends here -->
            </div>          
          </div>

          <!-- Most reads tab -->
          <div id="mostReads" class="tab-pane fade">
            <div id="reads-content">
              <?php
              $limit = 10;
              if (isset($_POST['page_no'])) {
                  $page_no = $_POST['page_no'];
              }else{
                  $page_no = 1;
              }
              $offset = ($page_no-1) * $limit;

              if (isset($_POST['query'])) {
                  //research studies content
                  $search = $_POST['query'];
                  $query = "SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'
                  ORDER BY Views DESC 
                  LIMIT $offset, $limit";

                  // this sql is for getting counts
                  $sql_count = " SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
                  //pagination
                  $sql = "SELECT * 
                  FROM researchstudy_table
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
              }else{
                  $query = "SELECT * FROM researchstudy_table 
                  ORDER BY Views DESC 
                  LIMIT $offset, $limit";
                  // this sql is for getting counts
                  $sql_count = " SELECT * from researchstudy_table ";
                  //pagination
                  $sql = "SELECT * FROM researchstudy_table";
              }
              // $query = "SELECT * FROM researchstudy_table 
              // ORDER BY Views DESC 
              // LIMIT $offset, $limit";
              $result = mysqli_query($conn, $query);
              ?>
                                  <!-- Here is the whole research study
                                  This part includes the research study details
                                  (titles, authors, abstract, view pdf, download file,
                                  and statistics for reads and downloads)-->

                                  <?php
                                  if (mysqli_num_rows($result) > 0) {
                                  echo '<hr class="mb-0">';
                                    while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                      <div class="cards hBg 
                                      border border-left-0
                                                      border-right-0
                                                      border-top-0
                                                      border-semilightblue">

                                        <div class="card-body">


                                          <!-- Research studies information -->
                                          <div class="row">
                              <div class="col">
                                <h4 class="sm-body-font-size"><?php echo $row["Title"] ?></h4><!-- Research title -->
                                <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                <!-- Author name -->
                                <p>Authors:
                                    <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                    <?php if ($row['Author2'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author3'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author4'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author5'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author6'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                  </p>
                                    <?php endif ?>
                                <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>
                              
                              <!-- Abstract contraction -->
                              <?php if (strlen($row['Abstract']) < 250): ?>
                              <p>
                                <?php echo $row['Abstract']; ?>
                              </p>
                              <?php endif ?>
                              <?php if (strlen($row['Abstract']) >= 250): ?>
                              <p>
                                <?php echo substr($row['Abstract'], 0, 250) ?>
                                <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                                <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                                <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                                <a type="button" onclick="readAbstract('most_read_cModalContent_',<?php echo $row['RS_ID'] ?>)" 
                                  id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                              </p>
                              <?php endif ?>
                              <!-- end of abstract -->

                                <!-- Statistics for small media -->
                                <p id="miniStats_<?php echo $row['RS_ID'] ?>"><small class="sm-show-stat">
                                  <?php if ($row['Views'] === 0) {
                                    echo '0';} else {  echo $row['Views']; } ?> Views | 
                                    <?php if ($row['Downloads'] === 0) {  echo '0'; } else {  echo $row['Downloads']; } ?> Downloads
                                  </small></p>


                                <!-- show this when a user is logged in -->
                                              <?php if (isset($_SESSION['user_id'])) { ?>
                                                <!-- Pending status -->
                                                <?php if($_SESSION['status'] === "pending") { ?>
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php }else { ?>
                                                <!-- Verified status -->
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php } ?>
                                              <?php } else { ?>

                                                <!-- show this when user isn't logged in -->

                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                                              <?php } ?>



                                <!-- Modal -->
                                <div class="modal fade" id="most_read_cModalContent_<?php echo $row['RS_ID']; ?>" role="dialog">
                                  <div class="modal-dialog modal-dialog-scrollable">

                                    <!-- Modal header -->
                                    <div class="modal-content">
                                      <div class="modal-title">

                                        <div class="modal-header">
                                                        <div class="btn-group">
                                                          <!-- Download PDF (logged in)-->
                                                          <?php if (isset($_SESSION['user_id'])) { ?>
                                                            <!-- Pending status -->
                                                            <?php if($_SESSION['status'] === "pending") { ?>
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php }else { ?>
                                                            <!-- Verified status -->
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php } ?>
                                                          <?php } else { ?>
                                                            <!-- Download PDF -->
                                                            <button type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</button><!-- Download button -->

                                                            <!-- View PDF -->
                                                            <button type="submit" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary"> View PDF</button><!-- View button -->
                                                          <?php } ?>

                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      </div>

                                      </div>

                                      <!-- Modal details -->

                                      <div class="modal-body">
                                        <!-- Make the title color black -->
                                        <!-- Make the hover color blue -->

                                        <div class="cfont cs-2"><?php echo $row['Title'] ?></div><!-- research title -->
                                        <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                        <p>Authors:
                                        <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                        <?php if ($row['Author2'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author3'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author4'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author5'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author6'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                    </p>
                                        <?php endif ?><!-- author name -->
                                        <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>

                                        <hr class="bg-muted">

                                        <p class="text-uppercase">Abstract</p>

                                        <p><?php echo $row['Abstract'] ?></p><!-- research abstract -->

                                      </div>

                                    

                                    </div>
                                  </div>
                                </div>

                                <!-- Mini tab for short details
                                    This <a> tag represent the button for the whole research study -->

                                <a href="#most_read_cModalContent_<?php echo $row['RS_ID']; ?>" class="stretched-link" data-toggle="modal" data-backdrop="static"></a>
                              </div>

                              <!-- Statistics for large media -->

                              <div class="col-2 sm-hide-stat">
                                <div class=" pt-2 text-ash">
                                  <p id="viewCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Views'] === 0) {  echo '0';} else { echo $row['Views'];} ?>
                                    <br>Readers</small></p><!-- count of views -->

                                </div>

                                <div class="pt-2 text-ash">
                                  <p id="downloadCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Downloads'] === 0) { echo '0';} else { echo $row['Downloads'];} ?>
                                    <br>Downloads</small></p><!-- count of downloads -->
                                </div>


                              </div>

                            </div> <!-- End of research studies information -->


                                        </div>



                                    </div>
                                    <?php
                                      } ?>
                                      <?php

                                      $records = mysqli_query($conn, $sql);

                                      $totalRecords = mysqli_num_rows($records);

                                      $totalPage = ceil($totalRecords/$limit);

                                      // Remove divs
                                      echo "<ul class='pagination justify-content-center mt-5'>";

                                      for ($i=1; $i <= $totalPage; $i++) { 
                                        if ($i == $page_no) {
                                        $active = "active";
                                        }else{
                                        $active = "";
                                        }


                                        }
                                         
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

                                    <?php } else {
                                      echo "No Results Found";
                                    } ?>

                                    <!-- The whole research study details ends here -->
              <!-- content on most_reads.php -->
            </div>
          </div>

          <!-- Most downloads tabs -->
          <div id="mostDownloads" class="tab-pane fade">
            <div id="downloads-content">
              <?php
              $limit = 10;
              if (isset($_POST['page_no'])) {
                  $page_no = $_POST['page_no'];
              }else{
                  $page_no = 1;
              }
              $offset = ($page_no-1) * $limit;

              if (isset($_POST['query'])) {
                  //research studies content
                  $search = $_POST['query'];
                  $query = "SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'
                  ORDER BY Downloads DESC 
                  LIMIT $offset, $limit";

                  // this sql is for getting counts
                  $sql_count = " SELECT * 
                  FROM researchstudy_table 
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
                  //pagination
                  $sql = "SELECT * 
                  FROM researchstudy_table
                  WHERE Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%'";
              }else{
                  $query = "SELECT * FROM researchstudy_table 
                  ORDER BY Downloads DESC 
                  LIMIT $offset, $limit";
                  // this sql is for getting counts
                  $sql_count = " SELECT * from researchstudy_table ";
                  //pagination
                  $sql = "SELECT * FROM researchstudy_table";
              }
              // $query = "SELECT * FROM researchstudy_table 
              // ORDER BY Views DESC 
              // LIMIT $offset, $limit";
              $result = mysqli_query($conn, $query);
              ?>
                                  <!-- Here is the whole research study
                                  This part includes the research study details
                                  (titles, authors, abstract, view pdf, download file,
                                  and statistics for reads and downloads)-->

                                  <?php
                                  if (mysqli_num_rows($result) > 0) {
                                  echo '<hr class="mb-0">';
                                    while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                      <div class="cards hBg 
                                      border border-left-0
                                                      border-right-0
                                                      border-top-0
                                                      border-semilightblue">

                                        <div class="card-body">


                                          <!-- Research studies information -->
                                          <div class="row">
                              <div class="col">
                                <h4 class="sm-body-font-size"><?php echo $row["Title"] ?></h4><!-- Research title -->
                                <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                <!-- Author name -->
                                <p>Authors:
                                    <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                    <?php if ($row['Author2'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author3'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author4'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author5'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author6'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                  </p>
                                    <?php endif ?>
                                <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>
                              
                              <!-- Abstract contraction -->
                              <?php if (strlen($row['Abstract']) < 250): ?>
                              <p>
                                <?php echo $row['Abstract']; ?>
                              </p>
                              <?php endif ?>
                              <?php if (strlen($row['Abstract']) >= 250): ?>
                              <p>
                                <?php echo substr($row['Abstract'], 0, 250) ?>
                                <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                                <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                                <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                                <a type="button" onclick="readAbstract('most_dl_cModalContent_',<?php echo $row['RS_ID'] ?>)" 
                                  id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                              </p>
                              <?php endif ?>
                              <!-- end of abstract -->

                                <!-- Statistics for small media -->
                                <p id="miniStats_<?php echo $row['RS_ID'] ?>"><small class="sm-show-stat">
                                  <?php if ($row['Views'] === 0) {
                                    echo '0';} else {  echo $row['Views']; } ?> Views | 
                                    <?php if ($row['Downloads'] === 0) {  echo '0'; } else {  echo $row['Downloads']; } ?> Downloads
                                  </small></p>


                                <!-- show this when a user is logged in -->
                                              <?php if (isset($_SESSION['user_id'])) { ?>
                                                <!-- Pending status -->
                                                <?php if($_SESSION['status'] === "pending") { ?>
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php }else { ?>
                                                <!-- Verified status -->
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php } ?>
                                              <?php } else { ?>

                                                <!-- show this when user isn't logged in -->

                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                                              <?php } ?>



                                <!-- Modal -->
                                <div class="modal fade" id="most_dl_cModalContent_<?php echo $row['RS_ID']; ?>" role="dialog">
                                  <div class="modal-dialog modal-dialog-scrollable">

                                    <!-- Modal header -->
                                    <div class="modal-content">
                                      

                                        <div class="modal-header">
                                          <div class="btn-group">
                                            <!-- Download PDF (logged in)-->
                                            <?php if (isset($_SESSION['user_id'])) { ?>
                                              <!-- Pending status -->
                                              <?php if($_SESSION['status'] === "pending") { ?>
                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                              <?php }else { ?>
                                              <!-- Verified status -->
                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                              <?php } ?>
                                            <?php } else { ?>
                                              <!-- Download PDF -->
                                              <button type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</button><!-- Download button -->

                                              <!-- View PDF -->
                                              <button type="submit" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary"> View PDF</button><!-- View button -->
                                            <?php } ?>

                                          </div>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>


                                      <!-- Modal details -->

                                      <div class="modal-body">
                                        <!-- Make the title color black -->
                                        <!-- Make the hover color blue -->

                                        <div class="cfont cs-2"><?php echo $row['Title'] ?></div><!-- research title -->
                                        <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                        <p>Authors:
                                          <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                          <?php if ($row['Author2'] != 'N/A'): ?>
                                            <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                          <?php endif ?>
                                          <?php if ($row['Author3'] != 'N/A'): ?>
                                            <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                          <?php endif ?>
                                          <?php if ($row['Author4'] != 'N/A'): ?>
                                            <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                          <?php endif ?>
                                          <?php if ($row['Author5'] != 'N/A'): ?>
                                            <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                          <?php endif ?>
                                          <?php if ($row['Author6'] != 'N/A'): ?>
                                            <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                        </p>
                                        <?php endif ?><!-- author name -->
                                        <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>

                                        <hr class="bg-muted">

                                        <p class="text-uppercase">Abstract</p>

                                        <p><?php echo $row['Abstract'] ?></p><!-- research abstract -->

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <!-- Mini tab for short details
                                    This <a> tag represent the button for the whole research study -->

                                <a href="#most_dl_cModalContent_<?php echo $row['RS_ID']; ?>" class="stretched-link" data-toggle="modal" data-backdrop="static"></a>
                              </div>

                              <!-- Statistics for large media -->

                              <div class="col-2 sm-hide-stat">
                                <div class=" pt-2 text-ash">
                                  <p id="viewCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Views'] === 0) {  echo '0';} else { echo $row['Views'];} ?>
                                    <br>Readers</small></p><!-- count of views -->

                                </div>

                                <div class="pt-2 text-ash">
                                  <p id="downloadCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Downloads'] === 0) { echo '0';} else { echo $row['Downloads'];} ?>
                                    <br>Downloads</small></p><!-- count of downloads -->
                                </div>


                              </div>

                            </div> <!-- End of research studies information -->


                                        </div>



                                    </div>
                                    <?php
                                      } ?>
                                      <?php

                                      $records = mysqli_query($conn, $sql);

                                      $totalRecords = mysqli_num_rows($records);

                                      $totalPage = ceil($totalRecords/$limit);

                                      // Remove divs
                                      echo "<ul class='pagination justify-content-center mt-5'>";

                                      for ($i=1; $i <= $totalPage; $i++) { 
                                        if ($i == $page_no) {
                                        $active = "active";
                                        }else{
                                        $active = "";
                                        }


                                        }
                                         
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

                                    <?php } else {
                                      echo "No Results Found";
                                    } ?>

                                    <!-- The whole research study details ends here -->
              <!-- content on most_downloads.php -->
            </div>
          </div>
        </div>
      <!-- div for Content -->

      </div>
  <!-- div for row -->
  </div>

    <!-- div for container -->
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


  <!-- Sweetalert js cdn -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Autocomplete -->
  <script src="/js/autocomplete.js"></script>
  <script src="../js/addCount.js"></script>
  <script src="../js/needToLogin.js"></script>
  <script src="../js/notVerified.js"></script>
  <script src="../js/login.js"></script>
  <!-- Read more and less link function -->
  <script src="../js/readAbstract_function.js"></script>
  <script src="/js/registration_professor_script.js"></script>
  <script src="/js/registration_student_script.js"></script>
  <script src="/js/showPassword.js"></script>
  <script src="/js/moreAlumnus_script.js"></script>
  <script src="/js/admin_research_search.js"></script>
  <script src="/js/research_studies_filter.js"></script>
</body>

</html>