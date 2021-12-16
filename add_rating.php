<?php
    require('connection.php');

    $rate = $_POST['rate'];
    $answer_id = $_POST['answer'];
    $client = $_POST['client'];

    $sql = "INSERT INTO answer_details(client_id, answer_id, rate) VALUES ('$client', '$answer_id','$rate');";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo("inserted");
    }
    else{
        echo mysqli_error($conn);
    }

?>