<?php
require_once 'connection.php';
?>

<?php
$id = $_GET['id'];
$query= mysqli_query($conn, "SELECT * FROM user WHERE user_id= '".$_SESSION['user_id'] ."' ");
$fetch=mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/sales.css">

</head>

<body>

    <form action="due.php" method="POST" enctype="multipart/form-data">
        <h1>Your Information</h1>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <label for="username">User Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="username" name="username" placeholder="<?php echo $fetch['username'] ?>"
                        >
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="address" required>Delivery Address:</label>
                </div>
                <div class="col-90">
                <select name="address" id="address" class="form-control" required>
    
    <option value="chitwan">Chitwan</option>
    <option value="hetauda">Hetauda</option>
    <option value="kathmandu">Kathmandu</option>
    <option value="pokhara">Pokhara</option>
  </select>
        <input type="text" id="addressdetail" name="addressdetail" placeholder="More details to your address"
                       >


                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <label for="phone">Phone No.</label>
                </div>
                <div class="col-90">
                    <input type="tel" id="phone" name="phone" placeholder="<?php echo $fetch['user_phone']?>" >

                </div>
            </div>
          
            <div class="row">
                <div class="col-10">
                    <input type="hidden" name="pid" value="<?php echo $id;?> " >
                    <?php 
                    $getproduct= mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                    $data=mysqli_fetch_assoc($getproduct);
                    $pimage=$data['product_image'];
                    $pname=$data['product_name'];
                    ?>
                    <label for="product">Product:
                       <img src="<?php echo $pimage;?>"  height="300px" width="300px">
                        <?php echo $pname;?>
                    </label>
                </div>
               
            </div>

            <div class="row">
                <input type="submit" value="BUY" name="buy">
            </div>
        </div>
    </form>

</body>

</html>