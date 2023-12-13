<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "decordb";
$conn = mysqli_connect($servername, $username, $password, $db_name);
if ($conn) {

    session_start();


} else {
    echo "connection failed";
}

?>

<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['name'];
    $phone = $_POST["phone"];
    $address = $_POST['address'];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $registered_at = date("Y-m-d");
    if (!preg_match("/^[a-zA-Z ]*$/",$username) ) {  
        echo "<script>
    alert('Only alphabets and whitespaces are allowed in name!!');
    window.location.href='account.php';
    </script>";
    } else {  
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (!preg_match ($pattern, $email) ){  
    $ErrMsg = "Email is not valid.";  
    echo "<script>
    alert('Email address not valid!');
    window.location.href='account.php';
    </script>";  
} else {  
    if ($password == $cpassword) {
        $dup = mysqli_query($conn, "SELECT * FROM user WHERE user_email='$email' ");
        if (mysqli_num_rows($dup) > 0) {
            echo "<script>
    alert('OOps! Email already exists.');
    window.location.href='account.php';
    </script>";

        } else {

            $insert = "INSERT INTO user(username, user_phone, user_address, user_email, 
          user_password, registered_at) VALUES ('$username','$phone','$address','$email','$password','$registered_at')";
            if (mysqli_query($conn, $insert)) {
                $_SESSION['login_user'] = $email;

                echo "<script>
    alert('Account created.');
    window.location.href='products.php';
    </script>";

               
            } else {
                echo "<script> alert('Oops! Something went wrong.')</script>";
            }
        }
    } else {
        echo "<script>
        alert('Password doesn't match!');
        window.location.href='account.php';
        </script>";
    }
      
}  
   
}  
        
   
}

?>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM user WHERE user_email='$username' AND 
            user_password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $sqli = "SELECT * FROM admin WHERE admin_email='$username' AND 
admin_password='$password'";
    $resulti = mysqli_query($conn, $sqli);
    $rowi = mysqli_fetch_array($resulti, MYSQLI_ASSOC);
    $counti = mysqli_num_rows($resulti);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;

        echo "<script> alert('Login Successful')</script>";
        header("Location: products.php");
    } else if ($counti == 1) {
        echo "<script> alert('Login Successful')</script>";
        header("Location: ../admin/");
    } else {

        echo "<script>
        alert('Email or password is invalid!');
        window.location.href='account.php';
        </script>";
    }

}

?>


<?php
$fetch = mysqli_query($conn, "SELECT * FROM user where user_email= '" . $_SESSION['login_user'] . "'");
$data = mysqli_fetch_assoc($fetch);
$uid = $data["user_id"];
$_SESSION['user_id'] = $data["user_id"];
?>



<?php
if (isset($_POST["category1"])) {

    $category = "Mirror";
    $category_id = "1";
}
if (isset($_POST["category2"])) {

    $category = "Wall Clocks";
    $category_id = "2";
}
if (isset($_POST["category3"])) {

    $category = "Home Garden";
    $category_id = "3";
}
if (isset($_POST["category4"])) {
    $category = "Lights Lamps";
    $category_id = "4";
}
if (isset($_POST["category5"])) {
    $category = "Decor & Furniture";
    $category_id = "5";
}
if (isset($_POST["category6"])) {
    $category = "Paintings";
    $category_id = "6";
}
if (isset($_POST["category7"])) {
    $category = "Handicrafts";
    $category_id = "7";
}
?>


<?php
if ((isset($_SESSION['login_user']))) {
    include 'header1.php';
} else {
    include 'header.php';
}
?>


<?php
if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    if (isset($_POST["review_submit"])) {
        $review = $_POST["review"];
        $rate = $_POST["rate"];
        if ((isset($_SESSION['login_user']))) {
            $sqlreq = "INSERT INTO `review`(`user_id`, `product_id`, `user_review`, `user_rate`) 
            VALUES ('$uid', '$pid', '$review', '$rate')";
            if (mysqli_query($conn, $sqlreq) === TRUE) {
$query=mysqli_query($conn, "SELECT * from products WHERE product_id=$pid");
if($query){
    $fetch=mysqli_fetch_assoc($query);
    $rating=floatval($fetch['rating']);
    $rating=($rating+floatval($rate))/2;
    $update=mysqli_query($conn,"UPDATE products SET rating = $rating WHERE product_id= $pid");
}

            } else {
                echo "Error: " . $sqlreq . "<br>" . $conn->error;

            }
        } else {
            echo '<script> alert("You need to login first")</script>';
        }
    }


}
?>