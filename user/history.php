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

    .cancel {

      padding: 1em;
      border: none;
      outline: none;
      cursor: pointer;
      border-radius: 3px;
      margin-top: 1em;
      font-weight: bold;
      width: 40%;
    }

    td .remove {



      padding: 1em;
      border: none;
      outline: none;
      cursor: pointer;
      border-radius: 3px;

      font-weight: bold;
      width: 130px;
    }
  </style>
</head>

<body>
  <?php
  require_once 'connection.php';
  ?>
  <h2 class="title"> PURCHASE HISTORY</h2>
  <table class="history">
    <tr>
      <th colspan="2">Order Details</th>
      <th>Amount</th>
      <th>Purchase Date</th>
      <th>Payment Method</th>
      <th colspan="2"> </th>
    </tr>

    <?php

    $sql_history = mysqli_query($conn, "SELECT * FROM history
        WHERE user_id='" . $_SESSION['user_id'] . "'");
    while ($row_history = mysqli_fetch_assoc($sql_history)) {
      $uid = $row_history['invoice_no'];
      $sql_orders = mysqli_query($conn, "SELECT * FROM orders
          WHERE invoice_no='$uid'");
      while ($row_orders = mysqli_fetch_assoc($sql_orders)) {
        $product = $row_orders['product_id'];
        $sql_products = mysqli_query($conn, "SELECT * FROM products where
            product_id=$product");
        while ($result = mysqli_fetch_assoc($sql_products)) {
          $status = $row_orders['pay_status'];
          $stat = $row_orders['order_status'];
          ?>
          <tr>
            <td><img src="<?php echo $result["product_image"]; ?>" alt="" style="height:5opx; width:50px;"></td>
            <td>
              <h3>
                <?php echo $result['product_name'] ?>
              </h3>
              <br />Receipt No:
              <?php echo $row_history['invoice_no'] ?>
            </td>
            <td>
              <?php echo $row_orders['total'] ?>
            </td>
            <td>
              <?php echo $row_orders['order_date'] ?>
            </td>
            <td>
              <?php
              if ($status == '0') {
                echo 'Cash on Delivery';
                if ($stat == '0') {
                  ?></br><button class="cancel" data-id="<?php echo $row_history["invoice_no"]; ?>">Cancel</button>
                  <?php
                } else {
                  ?></br>DELIVERED!!
                  <?php
                }

              } else {
                echo 'Online Payment';
                if ($stat == '0') {
                  ?></br><button value="Cancel"></button>
                  <?php
                } else {
                  ?></br>DELIVERED!!
                  <?php
                }
              }
              ?>
            </td>
            <td><button class="remove" name="remove" data-id="<?php echo $row_history["invoice_no"]; ?>"><i
                  class="fa fa-trash"></i></button></td>
          </tr>
          <?php

        }
      }
    }
    ?>

  </table>
  <script>
    var remove = document.getElementsByClassName("remove");
    for (var i = 0; i < remove.length; i++) {
      remove[i].addEventListener("click", function (event) {
        var target = event.target;
        var inid = target.getAttribute("data-id");
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            target.innerHTML = this.responseText;
            target.style.opacity = .3;
          }
        }

        xml.open("GET", "process.php?inid=" + inid, true);
        xml.send();
      })
    }
  </script>
   <script>
    var remove = document.getElementsByClassName("cancel");
    for (var i = 0; i < remove.length; i++) {
      remove[i].addEventListener("click", function (event) {
        var target = event.target;
        var cancel_id = target.getAttribute("data-id");
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            target.innerHTML = this.responseText;
            target.style.opacity = .3;
          }
        }

        xml.open("GET", "process.php?cancel_id=" + cancel_id, true);
        xml.send();
      })
    }
  </script>
</body>


</html>