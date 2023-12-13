
<?php

    include_once "../config/dbconnect.php";
    
    $user_id=$_POST['record'];
    $query="DELETE  FROM user where user_id='$order_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"User Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>