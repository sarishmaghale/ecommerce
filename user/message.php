<?php
require_once 'connection.php';

 
$check = mysqli_query($conn, "SELECT * FROM requests WHERE user_id='".$_SESSION['user_id']."' ORDER BY req_id DESC");


if(mysqli_num_rows($check)>0){
    
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

   table button {


padding: 1em;
border: none;
outline: none;
cursor: pointer;
border-radius: 3px;
font-weight: bold;
width: 50%;
}

   
  </style>
  </head>

<body>
<h2 class="title"> Request messages</h2>
  <table class="products">
    <tr>
      <th colspan="2">Product Details</th>
      <th>Status</th>
      <th >Action</th>
      
    </tr>
    <?php
    while($id=mysqli_fetch_assoc($check)){
        $pid=$id['product_name'];
    $status=$id['request_status'];
        if($status=='3'){
            $stat='Pending';
        }
        if($status=='1'){
            $stat='Declined';
        }
        if($status=='0'){
            $stat='Accepted';
        }
        ?>
    <tr>
            <td><img src="<?php echo $id["product_image"]; ?>" alt="" style="height:80px; width:80px;"></td>
            <td>
              <h3>
                <?php echo $id['product_name'] ?>
              </h3>
    </td>
    <td>
              <?php echo $stat ?>
            </td>
            <td><button class="remove" name="remove"  data-id="<?php echo $id["req_id"]; ?>"><i
                  class="fa fa-trash"></i></button></td>
   

<?php


    }
    }
    else{
        echo "No any request sent!!";
    }


?>
</table>
<script>
    var remove = document.getElementsByClassName("remove");
    for (var i = 0; i < remove.length; i++) {
      remove[i].addEventListener("click", function (event) {
        var target = event.target;
        var reqid = target.getAttribute("data-id");
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            target.innerHTML = this.responseText;
            target.style.opacity = .3;
          }
        }

        xml.open("GET", "process.php?reqid=" + reqid, true);
        xml.send();
      })
    }
  </script>
</body>
</html>