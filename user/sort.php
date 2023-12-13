<?php

require_once 'connection.php';
$dropdown= $_POST['dropdown'];
$data= [];
$query=mysqli_query($conn, "SELECT product_id, product_name, product_image, product_price, product_qty from products");
while($row=mysqli_fetch_array($query)){
    $data[]=$row;
}
if($dropdown=='lth'){
    function quickSort($array) {
        $count = count($array);
        if ($count <= 1) {
            return $array;
        }
    
        $pivot = $array[0];
        $left = $right = [];
    
        for ($i = 1; $i < $count; $i++) {
            if ($array[$i]['product_price'] < $pivot['product_price']) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
    
        return array_merge(quickSort($left), [$pivot], quickSort($right));
    }
    $choice='Price Range From Low To High';
}
if($dropdown=='htl'){
    function quickSort($array) {
        $count = count($array);
        if ($count <= 1) {
            return $array;
        }
    
        $pivot = $array[0];
        $left = $right = [];
    
        for ($i = 1; $i < $count; $i++) {
            if ($array[$i]['product_price'] > $pivot['product_price']) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
    
        return array_merge(quickSort($left), [$pivot], quickSort($right));
    }
    $choice='Price Range From High To Low';
}
if($dropdown=='atz'){
    function quickSort($array) {
        $count = count($array);
        if ($count <= 1) {
            return $array;
        }
    
        $pivot = $array[0];
        $left = $right = [];
    
        for ($i = 1; $i < $count; $i++) {
            if (strcmp($array[$i]['product_name'], $pivot['product_name']) < 0) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
    
        return array_merge(quickSort($left), [$pivot], quickSort($right));
    }
    $choice='Alphabetical order';
}
$sortedProducts = quickSort($data);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css" />

    <link rel="stylesheet" href="css/style4.css" />


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
    </style>
</head>

<body>



    <h2 class="title">
        <?php echo "$choice" ?>
    </h2>

    <div class="main">
<?php
    foreach ($sortedProducts as $product) {
 
?>
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
        </b></p>
        <?php
                       if ($product["product_qty"] == 0) {
                        echo ' <h4 style="color:red"> Out Of Stock </h4>';
                    }
                     else {
                        echo ' <h4 style="color:green;"> In Stock</h4>';
                    }
                        ?>
    <form action="checking.php" method="POST">
        <input value="<?php echo $product['product_id'] ?>" name="pid" type="hidden">
        <input value="Buy Now" name="buy_now" class="buy_now" type="submit">
    </form>
    <p class="view_details"><a href="products_dt.php?pid=<?php echo $product["product_id"]; ?>"> View
            Details</a></p>
</div>

<button class="add" name="add" data-id="<?php echo $product["product_id"]; ?> ">Add to cart</button>

</div>

<?php
}

?>

<script>

var product_id = document.getElementsByClassName("add");
for (var i = 0; i < product_id.length; i++) {
product_id[i].addEventListener("click", function (event) {
    var target = event.target;
    var id = target.getAttribute("data-id");
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            target.innerHTML = data.in_cart;
            document.getElementById("badge").innerHTML = data.num_cart + 1;
        }
    }
    xml.open("GET", "process.php?id=" + id, true);
    xml.send();
})
}

</script>

</div>
    <?php include_once 'footer.php';
    ?>
</body>

</html>