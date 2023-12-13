<?php
    include_once "../config/dbconnect.php";

    $product_id=$_POST['product_id'];
    $p_name= $_POST['p_name'];
    $p_desc= $_POST['p_desc'];
    $p_price= $_POST['p_price'];
    $category= $_POST['category'];
    $quantity=$_POST['p_qty'];

    if( isset($_FILES['newImage']) ){
        
        $location="../images/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../images/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $img;
        if (in_array($ext, $valid_extensions)) {
            $path = UPLOAD_PATH . $image;
            move_uploaded_file($tmp, $dir.$img);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE products SET 
        product_name='$p_name', 
        product_details='$p_desc', 
        product_price=$p_price,
        category_id=$category,
        product_qty=$quantity,
        product_image='$final_image' 
        WHERE product_id=$product_id");


    if($updateItem)
    {
        echo "true";

      
         

        
           
            
        
        
        
        
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>