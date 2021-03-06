<?php 
    include "server.php";

    $output = '';//this is the message inside pop up

        $fname = $conn -> real_escape_string($_POST['form_fname']);
        $sname = $conn -> real_escape_string($_POST['form_sname']);
        $mi = $conn -> real_escape_string($_POST['form_mi']);
        $department = $conn -> real_escape_string($_POST['form_department']);
        $address = $conn -> real_escape_string($_POST['form_address']);
        $username = $conn -> real_escape_string($_POST['form_uname']);
        $password = $conn -> real_escape_string($_POST['form_pass']);
        $r_password = $conn -> real_escape_string($_POST['form_repass']);
        $enc_password = md5($password);
        $enc_r_password = md5($r_password);

        $target_dir = "../Professor_ID/";
        $new_dir = str_replace(' ', '_', $username.'/');//folder named by the student that was registered
        //$id_front_name = $_FILES['form_file1']['name'];
        //$id_back_name = $_FILES['form_file2']['name'];
        $id_front_ext = strtolower(pathinfo($_FILES['form_file1']['name'], PATHINFO_EXTENSION));
        $id_back_ext = strtolower(pathinfo($_FILES['form_file2']['name'], PATHINFO_EXTENSION));
        $id_front_new_name = str_replace(' ', '_', $username.'front_id'.'.'.$id_front_ext);
        $id_back_new_name = str_replace(' ', '_', $username.'back_id'.'.'.$id_back_ext);
        //check if username already taken
        $select = "
        SELECT LOWER(student_username) FROM student_table WHERE LOWER(student_username) = LOWER('$username')
        UNION 
        SELECT LOWER(professor_username) FROM professor_table WHERE LOWER(professor_username) = LOWER('$username')
        UNION 
        SELECT LOWER(admin_username) FROM admin_table WHERE LOWER(admin_username) = LOWER('$username')";

        $check = $conn->query($select);
        if ($check->num_rows > 0) {
          $output = "username!";
        }else {

        $uploadOk = 1;//flag sht
        // Check if image file is a actual image or fake image
        $check1 = getimagesize($_FILES["form_file1"]["tmp_name"]);
        $check2 = getimagesize($_FILES["form_file2"]["tmp_name"]);
        if ($check1 == false && $check2 == false) {
            $uploadOk = 0;
            $output = "fake!";
        }
        // Check if file already exists
        elseif (file_exists($id_front_new_name && file_exists($id_back_new_name))) {
            $uploadOk = 0;
            $output = 'exist!';
        }
        // Check file size
        elseif ($_FILES["form_file1"]["size"] > 10000000 && $_FILES["form_file2"]["size"] > 10000000) {
            $uploadOk = 0;
            $output = "large!";
        }else {



            $sql = "INSERT INTO professor_table (professor_fname, professor_lname, professor_mi, professor_department, professor_username, professor_password, 
            professor_retype_password, professor_address, professor_id_front, professor_id_back)
            VALUES ('$fname', '$sname', '$mi', '$department', '$username', '$enc_password', '$enc_r_password', '$address', 
            '$id_front_new_name', '$id_back_new_name')";

            if ($conn->query($sql) === TRUE && $uploadOk === 1) {
                mkdir($target_dir.$new_dir);
                $new_dir_inside = $target_dir.$new_dir;
                move_uploaded_file($_FILES['form_file1']['tmp_name'], $new_dir_inside.$id_front_new_name);
                move_uploaded_file($_FILES['form_file2']['tmp_name'], $new_dir_inside.$id_back_new_name);
            }else {
                $output = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
        echo $output;   
  $conn->close(); 
?>
