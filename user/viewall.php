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
            height: 80%;
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
            font-size: 4.5rem;
        }

        .link {
            color: #ff523b;
            font-size: 18px;
            float: right;
            margin-right: 60px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="files/glider.min.css">

</head>

<body>

    <?php
    $id = $_GET['type'];
    if ($id == '1') {
        ?>

        <h2 class="title">BEST SELLING</h2>

        <div class="main">

            <?php

            $sql = mysqli_query($conn, 'SELECT product_id, count(product_id)
   FROM orders 
   GROUP BY  product_id
   ORDER BY count(product_id) DESC ');
            while ($result = mysqli_fetch_assoc($sql)) {
                $pd = $result['product_id'];
                $sqli = mysqli_query($conn, "SELECT * FROM products WHERE product_id=$pd");

                while ($resulti = mysqli_fetch_assoc($sqli)) {
                    ?>

                    <div class="card">

                        <div class="image">
                            <img src="<?php echo $resulti["product_image"]; ?>" alt="">
                        </div>

                        <div class="caption">
                        
                            <p class="product_name">
                                <?php echo $resulti["product_name"]; ?>
                            </p>
                            <p class="price"><b>Rs.
                                    <?php echo $resulti["product_price"]; ?>
                                </b></p>
                                <?php
                       if ($resulti["product_qty"] == 0) {
                        echo ' <h4 style="color:red"> Out Of Stock </h4>';
                    }
                     else {
                        echo ' <h4 style="color:green;"> In Stock</h4>';
                    }
                        ?>
                            <form action="checking.php" method="POST">
                                <input value="<?php echo $result['product_id'] ?>" name="pid" type="hidden">
                                <input value="Buy Now" name="buy_now" class="buy_now" type="submit">
                            </form>

                            <p class="view_details"><a href="products_dt.php?pid=<?php echo $result["product_id"]; ?>"> View
                                    Details</a></p>

                        </div>

                        <button class="add" name="add" data-id="<?php echo $result["product_id"]; ?> ">Add to cart</button>

                    </div>

                    <?php
                }
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


        <?php

    } else if ($id == '2') { ?>
            <?php



            $sql = "SELECT * FROM products ";
            $all_product = $conn->query($sql);
            ?>
            <h2 class="title">ALL PRODUCTS</h2>

            <div class="main">
                <?php
                while ($row = mysqli_fetch_assoc($all_product)) {
                    ?>

                    <div class="card">

                        <div class="image">
                            <img src="<?php echo $row["product_image"]; ?>" alt="">
                        </div>

                        <div class="caption">
                            <p class="rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                            <p class="product_name">
                            <?php echo $row["product_name"]; ?>
                            </p>
                            <p class="price"><b>Rs.
                                <?php echo $row["product_price"]; ?>
                                </b></p>

                            <form action="checking.php" method="POST">
                                <input value="<?php echo $row['product_id'] ?>" name="pid" type="hidden">
                                <input value="Buy Now" name="buy_now" class="buy_now" type="submit">
                            </form>

                            <p class="view_details"><a href="products_dt.php?pid=<?php echo $row["product_id"]; ?>"> View
                                    Details</a></p>

                        </div>

                        <button class="add" name="add" data-id="<?php echo $row["product_id"]; ?> ">Add to cart</button>

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




            <?php
    } ?>


</body>

</html>