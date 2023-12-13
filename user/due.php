

<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style4.css" />
    <link rel="stylesheet" type="text/css" href="files/glider.min.css">


    <title>Display Products</title>

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

        .seller_card {
            max-width: 300px;
            flex: 1 1 210px;
            text-align: center;
            height: 420px;
            border: 1px solid lightgray;
            margin: 20px;
        }

        .seller_card .seller_image {
            height: 70%;
            margin-bottom: 20px;
        }


        .seller_card .seller_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .seller_card .seller_caption {
            padding-left: 1em;
            text-align: left;
            line-height: 3em;
            height: 25%;
        }

        .seller_card .seller_caption p {
            text-align: center;
            font-size: 3rem;
        }

        .link {
            color: #ff523b;
            font-size: 18px;
            float: right;
            margin-right: 60px;
        }
    </style>
   

</head>

<body>
	<?php


if(isset($_POST['buy'])){
    $id=$_POST['pid'];
    $del_address= $_POST['address'];
    $add=$_POST['addressdetail'];
    $address= $del_address." ".$add;
    $phone=$_POST['phone'];
$sql = "SELECT * FROM products WHERE product_id='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	if (mysqli_num_rows($result) == 1) {
		$product = mysqli_fetch_assoc($result);
		$order_date = date("Y-m-d");

		$invoice_no = (time() + rand(1, 1000));

		$total = $product['product_price'];
		$category=$product['category_id'];
		$sqlreq = "INSERT INTO orders( user_id, product_id, invoice_no, total, pay_status, order_date, del_address, phone)
             VALUES ('" . $_SESSION['user_id'] . "', '$id', '$invoice_no', '$total', '0', '$order_date', '$address', '$phone')";
		if (mysqli_query($conn, $sqlreq) === TRUE) {
			$update= mysqli_query($conn, "UPDATE products set product_qty= product_qty-1 WHERE product_id= $id " );
			$delete= mysqli_query($conn, "DELETE FROM carts WHERE product_id='$id' AND user_id= '" . $_SESSION['user_id'] . "' ");
			$history = mysqli_query($conn, "INSERT into history (user_id, invoice_no) VALUES('" . $_SESSION['user_id'] . "', '$invoice_no')");

			echo "<script>
            alert('Your order has been placed');
        window.location.href='history.php';
            </script>";		


		
		}
		
		
		else {
			echo "Error: " . $sqlreq . "<br>" . $conn->error;

		}



   
    ?>

        
    </div>
   
	<?php	

	}
}
}

?>