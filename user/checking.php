<?php
include_once 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_id = $_POST['pid'];
    $sql = "SELECT * FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $product = mysqli_fetch_assoc($result);
            $invoice_no = $product['product_id'] . time();
            $total = $product['product_price'];
            $name = $product['product_name'];
            $qty = $product['product_qty'];
            $order_at = date('Y-m-d');
            $sqli = mysqli_query($conn,"INSERT INTO `orders`(`product_id`, `total`, `pay_status`, `order_date`, `invoice_no`, `user_id`, `order_status`) 
            VALUES ('$product_id','$total','0','$order_at','$invoice_no','".$_SESSION['user_id']."'','3')");

        }
    }
}
?>
<?php
if (isset($_SESSION['login_user'])) {
    if ($qty == '0') {
       die("<script>
            alert('cant buy. OUT OF STOCK!');
            window.location.href='products.php';
            </script>");

    } else {
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/css/all.min.css" />
        <link rel="stylesheet" href="css/style4.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <style>
                html {
                    font-size: 62.5%;
                }

                .buy_now {
                    float: right;
                    margin-right: 5%;
                    padding: 6px 8px;
                    text-align: center;
                    text-decoration: none;

                    font-size: 16px;
                    transition-duration: 0.4s;
                    cursor: pointer;
                    background-color: #f44336;
                    color: white;

                    border: 2px solid #f44336;

                }

                .buy_now:hover {
                    background-color: white;
                    color: black;
                }

                .pay {
                    float: right;
                    width: 500px;
                    margin: 50px;
                
                }
            </style>
            
        <link rel="stylesheet" type="text/css" href="glider.min.css">
    </head>

    <body>

        <h2 class="title">
            <?php echo $name; ?>
        </h2>

        <div class="main">

            <div class="card">

                <div class="image">
                    <img src="<?php echo $product["product_image"]; ?>" alt="">
                </div>

                <div class="caption">
                 
                    <p class="product_name">
                        <?php echo $product["product_name"]; ?>
                        </p>
                    <p class="price"><b>Rs.
                            <?php echo $product["product_price"]; ?>
                            </b>
                    </p>
                    <p class="product_name">
                        <?php echo $product["product_detail"]; ?>
                    </p>
                </div>

            </div>

                <div class="pay">
                    <b><h2>Pay With</h2></b>
                    <br/><br/>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                <input value="<?php echo $total; ?>" name="tAmt" type="hidden">
                                <input value="<?php echo $total; ?>" name="amt" type="hidden">
                                <input value="0" name="txAmt" type="hidden">
                                
                                <input value="0" name="psc" type="hidden">
                                <input value="0" name="pdc" type="hidden">
                                <input value="epay_payment" name="scd" type="hidden">
                                <input value="<?php echo $invoice_no; ?>" name="pid" type="hidden">
                                <input value="http://localhost/esewa/esewa_payment_success.php" type="hidden" name="su">
                                <input value="http://localhost/esewa/esewa_payment_failed.php" type="hidden" name="fu">

                                <input type="image" src="../images/esewa.png">
                            </form>
                        </li>

                        <li class="list-group-item">
                            <a href="book.php?id=<?php echo $product_id; ?>">
                                <button value="CASH ON DELIVERY" class="btn"> CASH ON DELIVERY

                                </button></a>
                        </li>

                    </ul>
                </div>
        </div>
            <?php include_once 'footer.php';
            ?>
            <?php
    }
} else {
    echo "<script>
    alert('You need to login first!');
    window.location.href='products.php';
    </script>";
    

} ?>
</body>

</html>