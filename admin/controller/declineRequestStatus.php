<?php

    include_once "../config/dbconnect.php";
   
    $request_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT request_status from requests where req_id='$request_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
         $update = mysqli_query($conn,"UPDATE requests SET request_status= '1' where req_id='$request_id'");
    
   
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>