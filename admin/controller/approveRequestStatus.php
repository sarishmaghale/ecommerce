<?php

    include_once "../config/dbconnect.php";
   
    $request_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT * from requests where req_id='$request_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

  
         $update = mysqli_query($conn,"UPDATE requests SET request_status= '0' where req_id='$request_id'");
       if($update){

       
      } 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>