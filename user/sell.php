<?php
require_once 'connection.php';
?>

<?php
if (isset($_POST['add_item'])) {


    $ProductName = $_POST['product_name'];
    $desc = $_POST['product_details'];
    $price = $_POST['product_price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $nameimg = $_FILES['userfile']['name'];
    $temp = $_FILES['userfile']['tmp_name'];


    $location = "../images/";
    $image = $location . $nameimg;



    move_uploaded_file($temp, $location . $nameimg);
    $extension = substr($nameimg,strlen($nameimg)-4,strlen($nameimg));
    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!preg_match("/^[a-zA-Z ]*$/",$ProductName) ) {  
        echo "<script>
    alert('Only alphabets and whitespaces are allowed in name!!');

    </script>";
    } else {
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else{
        $insert = mysqli_query($conn, "INSERT INTO requests( product_name, product_price, product_details, product_image,
        category_id, product_qty, user_id, request_status)
        VALUES ('$ProductName','$price','$desc','$image','$category','$quantity','" . $_SESSION['user_id'] . "','3')");



if (!$insert) {
 echo mysqli_error($conn);
} else {

     echo "<script>
     alert('Your request has been successfully sent. Please wait for a reply from admin.');
     window.location.href='sell.php';
     </script>";
 $last_id = mysqli_insert_id($conn);
}
    }
   
}
}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/sales.css">

</head>

<body>
    <a href="my_products.php?productID=<?= $last_id ?>">View</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <h1>Sell your handicrafts</h1>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <label for="product_name">Product Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="product_name" name="product_name" placeholder="Enter your product name"
                        required>
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="product_price">Price:</label>
                </div>
                <div class="col-90">
                    <input type="number" id="product_price" name="product_price" min="0"
                        placeholder="Enter the price for your product" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="product_details">Description</label>
                </div>
                <div class="col-90">
                    <textarea name="product_details" id="product_details" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="category" required>Category:</label>
                </div>
                <div class="col-90">
                    <select id="category" class="form-control" name="category" required>
                        <option disabled selected>Select category</option>
                        <?php
                        $sql = "SELECT * from categories ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['category_id'] . "'>" . $row['category'] . "</option>";
                            }
                        }
                        ?>

                    </select>


                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="quantity">Quantity</label>
                </div>
                <div class="col-90">
                    <input type="number" id="quantity" name="quantity" min="0" required>

                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="file">Choose Image:</label>
                </div>
                <div class="col-90">
                    <input type="file" name="userfile" id="userfile" accept="image/*" required>
                </div>
            </div>


            <div class="row">
                <input type="submit" value="Send request" name="add_item">
            </div>
        </div>
    </form>

</body>

</html>