<?php 
    require('connection.php');

    $full_name = $_POST['full-name'];
    $textarea = $_POST['textArea'];
    $job_id = $_POST['job-id'];
    $user_email = $_SESSION['name'];

    $tmp = $_FILES['files']['tmp_name'];
    $file_name = time().$_FILES['files']['name'];
    move_uploaded_file($tmp, "application/$file_name");

    $sql = "INSERT INTO job_applications(job_id, full_name, user_email, interest, file_path) VALUES ('$job_id', '$full_name', '$user_email', '$textarea','$file_name');";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo("inserted");
        header('location:job-details.php?job='.$job_id);
    }
    else{
        echo mysqli_error($conn);
    }


?>