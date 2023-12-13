<?php
require_once 'connection.php';
$ID = $_GET['productID'];

$last_id = mysqli_insert_id($conn);
 
$check = mysqli_query($conn, "SELECT * FROM seller WHERE req_id=$ID");
if ($check) {
    if (mysqli_num_rows($check) > 0) {
        echo "Your request has been accepted!";
    }

}
$my_products= mysqli_query($conn, "SELECT * FROM seller where user_id= '".$_SESSION['user_id']."' ");
if(mysqli_num_rows($my_products)>0){
    while($id=mysqli_fetch_assoc($my_products)){
    $pid=$id['product_id'];
    $products= mysqli_query($conn, "SELECT * from products where product_id ='$pid' ");
    if($products){
    while($data= mysqli_fetch_assoc($products)){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />



  <link rel="stylesheet" href="css/style4.css" />

  <style>
    table {
      margin-top: 10px;
      width: 98%;
      border-collapse: collapse;
      border-spacing: 0;
      margin: 6px;

      border-radius: 12px 12px 0 0;

    }

    td,
    th {
      padding: 10px 13px;
      text-align: center;
    }

    th {
      background-color: #584e46;
      color: #fafafa;

      font-family: 'Open Sans', Sans-serif;
      font-weight: bold;
    }

    tr {
      width: 100%;

      background-color: #fafafa;
      font-family: 'Montserrat', sans-serif;
    }

    tr:nth-child(even) {
      background-color: #eeeeee;
    }

  

   
  </style>
  </head>

<body>
<h2 class="title"> MY PRODUCTS</h2>
  <table class="products">
    <tr>
      <th colspan="2">Product Details</th>
      <th>Amount</th>
      <th>Quantity</th>
      <th>Details</th>
   
    </tr>
    <tr>
            <td><img src="<?php echo $data["product_image"]; ?>" alt="" style="height:80px; width:80px;"></td>
            <td>
              <h3>
                <?php echo $data['product_name'] ?>
              </h3>
    </td>
    <td>
              <?php echo $data['product_price'] ?>
            </td>
            <td>
              <?php echo $data['product_qty'] ?>
            </td>
            <td>
              <?php echo $data['product_details'] ?>
            </td>

<?php


    }
    }
}
}

?>

</body>
</html>