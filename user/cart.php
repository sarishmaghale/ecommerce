<?php

require_once 'connection.php';

$sql_cart = "SELECT * FROM carts WHERE user_id= '" . $_SESSION['user_id'] . "'";
$all_cart = $conn->query($sql_cart);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/all.min.css">


    <style>
        main {
            max-width: 1500px;
            width: 95%;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;
        }

        html {
            font-size: 62.5%;
        }

        main {
            max-width: 1300px;
            width: 80%;
            margin: 30px auto;
            display: flex;
            flex-direction: column;
        }

        main .card {
            height: 150px;
            border: 1px solid lightgray;
            margin: 20px;
            display: flex;
        }

        main .card .images {
            width: 20%;
        }

        main .card .images img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        main .card .caption {
            line-height: 3em;
            margin-left: 30px;
            position: relative;
            width: 75%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        main .card .caption p {
            font-size: 1.5rem;
        }

        main .card .caption .rate {
            display: flex;
        }

        main .card .caption .rate i {
            color: red;
            margin-left: 2px;
        }

        main .card .caption button {

            position: absolute;
            top: 5%;
            right: 5%;
            padding: 1em;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 3px;
            margin-top: 2em;
            font-weight: bold;
            width: 20%;
        }

        main .card .caption .buy_now {

            position: absolute;
            top: 60%;
            width: 20%;
            right: 5%;
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

        main .card .caption .buy_now:hover {
            background-color: white;
            color: black;
        }
    </style>

</head>

<body>


    <main>
        <h1>
            <?php echo mysqli_num_rows($all_cart); ?> Items
        </h1>
        <h1>
            <hr>
            <?php
            while ($row_cart = mysqli_fetch_assoc($all_cart)) {
                $sql = "SELECT * FROM products WHERE product_id=" . $row_cart["product_id"];
                $all_product = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($all_product)) {
            ?>
                    <div class="card">
                        <div class="images">
                            <img src="<?php echo $row["product_image"]; ?>" alt="">
                        </div>

                        <div class="caption">
                            <p class="product_name">
                                <?php echo $row["product_name"]; ?>
                            </p>
                            <p class="rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>

                            <p class="price"><b>Rs.
                                    <?php echo $row["product_price"]; ?>
                                </b></p>

                            <button class="remove" data-id="<?php echo $row["product_id"]; ?>">
                            <i class="fa fa-trash"></i></button>

                            <form action="checking.php" method="POST">
                                <input value="<?php echo $row['product_id'] ?>" name="pid" type="hidden">
                                <input value="Buy Now" name="buy_now" class="buy_now" type="submit">
                            </form>
                        </div>
                    </div>
                    <?php
                    $total_price += ($row["product_price"]);
                }
                ?>
            <?php
            }
            ?>

            <h1 style="text-align:right;">TOTAL:
                <strong>
                    <?php echo "Rs. " . number_format($total_price, 2); ?>
                </strong>
            </h1>

    </main>

    <script>
        var remove = document.getElementsByClassName("remove");
        for (var i = 0; i < remove.length; i++) {
            remove[i].addEventListener("click", function (event) {
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        target.innerHTML = this.responseText;
                        target.style.opacity = .3;
                    }
                }

                xml.open("GET", "process.php?cart_id=" + cart_id, true);
                xml.send();
            })
        }
    </script>
    

</body>


</html>