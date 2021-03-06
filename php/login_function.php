<?php
include "server.php";

if (isset($_POST['login-submit'])) {
    $username = strtolower($_POST['form_uname']);//username from login form
    $password = $_POST['form_pass'];//password from login form
    $location = $_POST['redirect'];//link to redirect
    //IDs'
    $student_id = 0;
    $professor_id = 0;
    $admin_id = 0;
    //usernames
    $student_user = '';
    $professor_user = '';
    $admin_user = '';
    //passwords
    $student_pass = '';
    $professor_pass = '';
    $admin_pass = '';
    //status
    $student_status = '';
    $professor_status = '';
    //name
    $admin_lastname = '';

    //student login info
    $sql1 = "SELECT * 
    FROM student_table 
    WHERE LOWER(student_username) = '$username'";
    //professor login info
    $sql2 = "SELECT * 
    FROM professor_table WHERE 
    LOWER(professor_username) = '$username'";
    //admin login info
    $sql3 = "SELECT * 
    FROM admin_table 
    WHERE LOWER(admin_username) = '$username'";


    if($result1 = $conn->query($sql1)){
        while($row1 = $result1->fetch_assoc()){
            $student_user = $row1['student_username'];
            $student_pass = $row1['student_password'];
            $student_status = $row1['student_account_status'];
            $student_id = $row1['student_id'];
        }
    }

    if($result2 = $conn->query($sql2)){
        while($row2 = $result2->fetch_assoc()){
            $professor_user = $row2['professor_username'];
            $professor_pass = $row2['professor_password'];
            $professor_status = $row2['professor_account_status'];
            $professor_id = $row2['professor_id'];
        }
    }

    if($result3 = $conn->query($sql3)){
        while($row3 = $result3->fetch_assoc()){
            $admin_user = $row3['admin_username'];
            $admin_pass = $row3['admin_password'];
            $admin_id = $row3['admin_id'];
            $admin_lastname = $row3['admin_lname'];
        }
    }

    if ($username === strtolower($student_user) && md5($password) === $student_pass) {
        session_start();
        $_SESSION['user_id'] = $student_id;
        $_SESSION['status'] = $student_status;
        $_SESSION['user'] = "Student";
        echo "Error: " . $sql1 . "<br>" . $conn->error;

    } 
    elseif ($username === strtolower($professor_user) && md5($password) === $professor_pass) {
        session_start();
        $_SESSION['user_id'] = $professor_id;
        $_SESSION['status'] = $professor_status;
        $_SESSION['user'] = "Professor";
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    } 
    elseif ($username === strtolower($admin_user) && md5($password) === $admin_pass) {
        session_start();
        $_SESSION['user_id'] = $admin_id;
        $_SESSION['status'] = 'admin';
        $_SESSION['user'] = "Admin";
        $_SESSION['lastname'] = $admin_lastname;
        echo 'admin';
    }else {
        echo 'failed';
    }
}