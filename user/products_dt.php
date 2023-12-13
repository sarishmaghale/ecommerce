<?php

require_once 'connection.php';
$pid = "";
if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
}

$sql_query = "SELECT * FROM products WHERE product_id= '$pid'";
$result = $conn->query($sql_query);

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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style4.css" />

    <style>
        .row1 {
            margin-top: 30px;


        }

        .buy_now {

            margin-right: 50%;

        }

        .container {
            max-width: 1300px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
        }

        .coll {

            float: left;
            margin-left: 40px;
        }

        .coll img {
            width: 100%;
            cursor: pointer;
            padding-right: 10%;

        }

        .row1 .col7 {
            padding: 10px;

        }

        .row {
            padding: 8px;
            border-color: grey;
            border-bottom-style: solid;
            border-bottom-width: 1.5px;
            width: fit-content;
            width: 50%;
        }

        .small-container {
            /* max-width: 1080px; */
            max-width: 100%;
            margin: auto;
            padding-left: 10px;
            padding-right: 10px;
        }

        .coll p {
            font-size: 20px;
            margin: 12px 0;
            color: #777;
        }

        .review {
            display: flex;
        }

        .review-box {
            margin: 15px 0 10px;
            max-width: 80%;
            width: 30%;
            margin-left: 10%;
            resize: none;
            height: 50px;
            font-size: 20px;
            text-align: center;
            background-color: #f8f8f8;
        }

        .review_submit {
            margin: 15px 0 10px;
            margin: 10px;
            width: 5%;
        }
    </style>
    <title>Display Product Details</title>
</head>

<body>

    <div class="container">


        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="row1">

                    <div class="coll">
                        <img src="<?php echo $row["product_image"] ?>" alt="" style="width:100mm;height:80mm">
                    </div>

                    <div class="col7">
                        <h2>
                            <?php echo $row["product_name"]; ?>
                        </h2><br />
                        <h4>
                            <p style="color:grey;"> Price : Rs.
                                <?php echo $row["product_price"]; ?>/-
                            </p>
                        </h4><br />

                        <?php
                        if ($row["product_qty"] == 0) {
                            echo ' <h4 style="color:red"> Out Of Stock </h4>';
                        } else {
                            echo ' <h4 style="color:green;"> In Stock</h4>';
                        }
                        ?>

                        <br />
                        <p style="color:grey;">
                            <?php echo $row["product_details"]; ?>
                        </p><br />
                        <?php
$upload_type=$row['$upload_type'];
if($upload_type!=1){
    $pid=$row['product_id'];
    $query=mysqli_query($conn, "SELECT user_id FROM seller WHERE product_id =$pid");
    if($query){
        while($data=mysqli_fetch_assoc($query)){
            $uid=$data['user_id'];
        $fetch=mysqli_query($conn, "SELECT * FROM user where user_id=$uid");
        if($fetch){
            while($data=mysqli_fetch_assoc($fetch)){

            
    ?>
    <b>
    <p style="color:grey;">
    SELLER:
                         <?php echo $data["username"]; ?>
                        </p></b><br />
        <?php
}
}        
}}
}             
?>
                        <form action="checking.php" method="POST">
                            <input value="<?php echo $row['product_id'] ?>" name="pid" type="hidden">
                            <input value="Buy Now" name="buy_now" class="buy_now" type="submit">
                        </form>
                        <button class="add" name="add" data-id="<?php echo $row["product_id"]; ?> ">Add to cart</button>

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
        </div>
    </div>
    
    <!-- review & feedback part-->



    <h2 class="title">Rating & Reviews</h2>

    <form action="#" method="POST">
        <p class="review">
             
            <input type="text" placeholder="Write your review here" class="review-box" name="review" id="review">
            <input type="number" min="1" max="5" name="rate" id="rate" placeholder="Rate: __/5">
            <button name="review_submit" class="review_submit"
                data-id="<?php echo $row["product_id"]; ?> ">Submit</button>
        </p>
        <script>
            $('#review').focus(function () {
                // store original height
                $(this).attr('data-height', $(this).height());
                // animate the height change
                $(this).animate({ height: 100 }, 'slow');
            }).blur(function (e) {
                // set to original height
                $(this).animate({ height: $(this).attr('data-height') }, 'slow');
            });

            var product_id = document.getElementsByClassName("review_submit");
            for (var i = 0; i < product_id.length; i++) {
                product_id[i].addEventListener("click", function (event) {
                    var target = event.target;
                    var pid = target.getAttribute("data-id");
                    var xml = new XMLHttpRequest();
                    xml.open("GET", "connection.php?pid=" + pid, true);
                    xml.send();
                })
            }
        </script>
        <?php
        $fetch_reviews = "SELECT * FROM review WHERE product_id= '$pid'";
        $reviews = $conn->query($fetch_reviews);
        if ($reviews->num_rows > 0) {
            while ($rows = $reviews->fetch_assoc()) {
                $uid = $rows["user_id"];
                $fetch_user = "SELECT * FROM user WHERE user_id= '$uid'";
                $uinfo = $conn->query($fetch_user);
                if ($uinfo->num_rows > 0) {
                    while ($row = $uinfo->fetch_assoc()) {
                        ?>



                        <div class="testimonial">
                            <div class="small-container">
                                <div class="row">
                                    <div class="col-3">
                                        <h4>
                                            <?php echo $row["username"]; ?>
                                        </h4>
                                     
                                        <p style="color:grey;">
                                            <?php echo $rows["user_review"]; ?><br/>
                                           Rating: <?php echo $rows["user_rate"]; ?>/5
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
            }
        }
        ?>
    </form>

    <?php include_once 'footer.php';
    ?>
</body>

</html>