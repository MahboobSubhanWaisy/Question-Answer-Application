<?php 
    require('connection.php');
    $id = $_GET['id'];
    
    $sql = "UPDATE answer SET accept = '1' WHERE answer_id = '$id' ";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo "updated";
    }
    else{
        echo mysqli_error($conn);
    }

?>