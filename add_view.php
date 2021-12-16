<?php
    require('connection.php');
    $id = $_GET['id'];

    $select = mysqli_query($conn, 'SELECT views FROM questions WHERE question_id = "'.$id.'"');
    $data = mysqli_fetch_array($select);

    $oldView = $data[0];
    $view = $oldView + 1;

    $sql = "UPDATE questions SET views = '$view' WHERE question_id = '$id' ";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo "updated";
    }
    else{
        echo mysqli_error($conn);
    }


?>