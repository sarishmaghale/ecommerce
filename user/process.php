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
$fetch = mysqli_query($conn, "SELECT * FROM user where user_email= '" . $_SESSION['login_user'] . "'");
$data = mysqli_fetch_assoc($fetch);
$uid = $data["user_id"];

if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $sql = "SELECT * FROM carts WHERE product_id = $product_id AND user_id = $uid";
    $result = $conn->query($sql);
    $total_cart = "SELECT * FROM carts WHERE user_id = $uid ";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);

    if(mysqli_num_rows($result)>0){
        $in_cart = "already In cart";

        echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    }else{
        $insert = "INSERT INTO carts (product_id, user_id) VALUES('$product_id' , '$uid')";
        if($conn->query($insert) === true){
            $in_cart = "added into cart";
            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            echo "<script>alert(It doesn't insert)</script>";
        }
    }
}


if (isset($_GET["cart_id"])) {
    $product_id = $_GET["cart_id"];
    $sql = "DELETE FROM carts WHERE product_id=" . $product_id;

    if ($conn->query($sql) === TRUE) {
        echo "Removed from cart";
    }
}

?>

<?php
if (isset($_GET["inid"])) {
    $invoice_no = $_GET["inid"];
    $sql = "DELETE FROM history WHERE invoice_no=" . $invoice_no;

    if ($conn->query($sql) === TRUE) {
        echo "Removed from purchase history";
    }
}

?>
<?php
if (isset($_GET["cancel_id"])) {
    $invoice_no = $_GET["cancel_id"];
    $sql = "DELETE FROM orders WHERE invoice_no=" . $invoice_no;

    if ($conn->query($sql) === TRUE) {
        echo "Order Cancelled";
    }
}

?>
<?php
if (isset($_GET["reqid"])) {
    $req_id = $_GET["reqid"];
    $sql = "DELETE FROM requests WHERE req_id=" . $req_id;

    if ($conn->query($sql) === TRUE) {
        echo "Removed";
    }
}

?>