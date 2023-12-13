<?php
    include_once "../config/dbconnect.php";
    
   
        
       
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
        $quantity= $_POST['p_qty'];
       
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
                
        
        $location="../images/";
        $image=$location. $name;

        $target_dir="../images/";
        $finalImage=$target_dir. $name;

        move_uploaded_file($temp, $target_dir.$name);

        $extension = substr($name,strlen($name)-4,strlen($name));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        
        if (!preg_match("/^[a-zA-Z ]*$/",$ProductName) ) {  
            echo "<script> alert('Only alphabets and whitespaces are allowed in name!!')</script>";
          
    
        } else {
        if(!in_array($extension,$allowed_extensions))
        {
            echo "<script> alert('Invalid format. Only jpg / jpeg/ png /gif format allowed')</script>";
      
        }
        else{
        $insert = mysqli_query($conn,"INSERT INTO products( product_name, product_price, product_details, product_image,
        category_id, product_qty, upload_type)
        VALUES ('$ProductName','$price','$desc','$image','$category','$quantity','1')");
         
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
            echo "<script> alert('Records added successfully.')</script>";
           
         

 
         }
        }
    }
        
    
   
?>