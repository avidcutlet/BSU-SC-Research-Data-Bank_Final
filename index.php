<?php
require "php/header.php";
include "php/server.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BSU-SC Research DB</title>

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
  <!-- Changed, not working in localhost -->
  <link rel="stylesheet" href="css/index_style.css">
  <link rel="stylesheet" href="css/responsive_style.css">
  <link rel="stylesheet" href="css/autocomplete.css">

  <!-- Font size not working without these >_< -->
  <link rel="stylesheet" href="css/contact_style.css">  


</head>

<body>


  <!-- navigator, modal, body -->
  <div class="bg" style="padding-bottom: 25%;">
    <div class="sticky-top">


      <nav class="navbar navbar-expand-md navbar-light bg-light">

        <div class="container-fluid">

          <div>
            <div class="header-font">
              <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'Admin'){ ?>
                <a class="navbar-brand" href="php/research_coordinator_page.php">Research DB</a> 
              <?php }else{ ?>
                <a class="navbar-brand" href="index.php">Research DB</a>
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

              <li class="nav-item active">
                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'Admin'){ ?>
                  <a class="nav-link" href="/php/research_coordinator_page.php/index.php">Home</a>
                <?php }else{ ?>
                  <a class="nav-link" href="index.php">Home</a>
                <?php } ?>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="php/about_page.php">About</a>

              </li>

              <li class="nav-item">
                <a class="nav-link" href="php/contact_page.php">Contact</a>

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
                <a class="nav-link" href="#" data-toggle="modal"
                    data-target="#signIn_mc">Sign in</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal"
                    data-target="#create_mc">Create account</a>
              </li>
              <?php }else { ?>
                <li class="nav-item">
                  <form id="logout" action="php/logout.php" method="post">
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
                          <option value="BIT Department" required>BIT Department</option>
                          <option value="EDUC Department" required>EDUC Department</option>
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

    

    <!-- body -->

    <div class="container-fluid">
      <div class="display-5 lg-margin sm-margin">
        <h1 class="header-font sm-font-size">Welcome to Research Databank</h1>
        <p style="font-size:larger">Search the knowledge hidden within</p>

        <!-- Search form -->
        <form action="php/search_page.php" method="post" onsubmit="searchInput()">
          <div class="input-group mb-3 mt-4 w-50 search-min-width">
          <!-- Search button -->
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary "
                        type="submit">Search</button>
            </div>
              <!-- Search input -->
              <input type="hidden" name="page" value="1">
              <input type="text" class="form-control bg-transparent" id="search-input" name="query" autocomplete="off"
                      placeholder="Search for articles..." required oninput="getWidth()">
          </div>
        </form>
        <div id="menu-container" class="input-group sm-width l-width"></div>


        <!-- Most search keywords -->

        <div class="container ml-0 w-50">
          <div class="row">

            <?php  
            $sql = "SELECT Title FROM researchstudy_table ORDER BY Search DESC";
            $result = $conn->query($sql);
            $mostViewed = array();
            $x = 0;

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
              
              $mostViewed[$x] = $row['Title'];
              $x++;
              }
            } else {
              echo "0 results";
            }
            ?>
            <h6 class="mr-2">Most Search Titles:</h6>

            
            <!-- Hoverable links added -->
            <!-- div with sm-hide are for large screens -->
            <!-- sm-hide added -->
            <!-- add links links in a tags -->
            <div class="sm-hide">
              <a href="#" class="hover-most-search1">Rank&nbsp;1</a>
            
              <span>&ThickSpace;&ThickSpace;</span>
           
              <a href="#" class="hover-most-search2">Rank&nbsp;2</a>
            
              <span>&ThickSpace;&ThickSpace;</span>

              <a href="#" class="hover-most-search3">Rank&nbsp;3</a>
            </div>


          </div>

          <!-- Other infos moved -->
          <div class="ml-n3 sm-hide">
            <i class="other-infos1"><?php echo $mostViewed[0] ?></i>
            <i class="other-infos2"><?php echo $mostViewed[1] ?></i>
            <i class="other-infos3"><?php echo $mostViewed[2] ?></i>
          </div>

          <!-- sm-show are for small screens -->
          <!-- add links in the next div -->

          <div class="ml-n3 sm-show-mst-search">
              <a href="#" class="hover-most-search4">Rank&nbsp;1</a>
            
              <span>&ThickSpace;&ThickSpace;</span>
           
              <a href="#" class="hover-most-search5">Rank&nbsp;2</a>
            
              <span>&ThickSpace;&ThickSpace;</span>

              <a href="#" class="hover-most-search6">Rank&nbsp;3</a>
            </div>


          </div>

          <!-- Add links for small devices here -->
          <div class="sm-show-mst-search w-50">
            <a class="other-infos4"><?php echo $mostViewed[0] ?></a>
            <a class="other-infos5"><?php echo $mostViewed[1] ?></a>
            <a class="other-infos6"><?php echo $mostViewed[2] ?></a>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid
                jumbotron-bg-black text-white">
    <div class="container">

      <!-- Information modified -->
      <!-- Note: Change all jumbotron -->
      <h2 class="header-font">Bond With Us!</h2>
      <p> Explore, investigate, analyze, experiment, and test now.<br>
          Join the aspiring professional researchers at Bulacan State University - Sarmiento Campus.</p>
    </div>
  </div>


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
    <!-- sweet alert -->
    <script>
      // Hoverable most search

    $(document).ready(function(){

    // First link large device
    
    $(".other-infos1").css("display", "none");
    $(".hover-most-search1").hover(function(){$(".other-infos1").css("display", "inline");},
                                   function(){$(".other-infos1").css("display", "none");});

    // First link small device
    $(".other-infos4").css("display", "none");
    $(".hover-most-search4").hover(function(){$(".other-infos4").css("display", "inline");},
                                   function(){$(".other-infos4").css("display", "none");});


    // Second link large device
    $(".other-infos2").css("display", "none");
    $(".hover-most-search2").hover(function(){$(".other-infos2").css("display", "inline");},
                                   function(){$(".other-infos2").css("display", "none");});

    // Second link small device
    $(".other-infos5").css("display", "none");
    $(".hover-most-search5").hover(function(){$(".other-infos5").css("display", "inline");},
                                   function(){$(".other-infos5").css("display", "none");});


    // Third link large device
    $(".other-infos3").css("display", "none");
    $(".hover-most-search3").hover(function(){$(".other-infos3").css("display", "inline");},
                                   function(){$(".other-infos3").css("display", "none");});

    // Third link small device
    $(".other-infos6").css("display", "none");
    $(".hover-most-search6").hover(function(){$(".other-infos6").css("display", "inline");},
                                   function(){$(".other-infos6").css("display", "none");});

    });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Changed, not working in localhost -->
    <script src="js/login.js"></script>
    <script src="js/registration_professor_script.js"></script>
    <script src="js/registration_student_script.js"></script>
    <script src="js/showPassword.js"></script>
    <script src="js/moreAlumnus_script.js"></script>
    <script src="js/autocomplete.js"></script>
</body>

</html>