<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | BSU-SC Research DB</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">

    <!-- Other resources -->
    <link rel="stylesheet" href="../css/login_style.css">

</head>
<body>

<!-- Form -->
    <div class="container">
        <h1 class="d-flex justify-content-center header-font">Someone is logging in...</h1>

        <form action="login_function.php" method="post"
                class="needs-validation
                        border border-dark rounded-lg
                        p-4 mx-auto mb-3 form-width">
            
            
            <!-- Forename field -->

            <div class="form-group">
                <label for="form_fname">Username:</label>
                
                <input type="text"
                        class="form-control"
                        id="form_uname"
                        placeholder="Username"
                        name="form_uname"
                        minlength="2"
                        maxlength="30"
                        required>                

            </div>

            <!-- Password field -->


            <div class="form-group mt-2">
                <label for="form_pass">Passsword:</label>
                <input type="password"
                        name="form_pass"
                        id="form_pass"
                        placeholder="Password"
                        class="form-control"
                        maxlength="30"
                        minlength="8"
                        required>

            </div>

            
            <!-- Checkbox -->
            
            
            <div class="row">
                <div class="form-group col">
                    <input type="checkbox">
                    <span>Remember me</span>
                </div>

                <!-- Register btn -->
                <div class="col d-flex justify-content-end">
                    <button name="login-submit" id="login-submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            
            </div>
            

                
            

            <span class="d-flex justify-content-center mt-3">Don't have an account yet?&MediumSpace;
                <a href="login.php">Register here.</a>
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


    
</body>
</html>