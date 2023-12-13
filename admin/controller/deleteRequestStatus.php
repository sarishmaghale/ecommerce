<?php

    include_once "../config/dbconnect.php";
    
    $request_id=$_POST['record'];
    $query="DELETE  FROM requests where req_id='$request_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Request Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>