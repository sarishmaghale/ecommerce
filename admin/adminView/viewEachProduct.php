<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Name</th>
            <th> </th>
            <th>Price</th>
            <th>Details</th>
            <th>Quantity</th>
            <th>Category</th>
   
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['productID'];
        //echo $ID;
        $sql="SELECT * from products 
        where product_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                $pid=$row['product_id'];
               
    ?>
                <tr>
                    <td><?=$count?></td>
                  
                    <td><?=$row["product_name"] ?><br/>Product ID: <?=$row["product_id"] ?></td>
                    <td><img height="80px" src="<?=$row["product_image"]?>"></td>
                    
                    <td><?=$row["product_price"] ?></td>
    
                    <td><?=$row["product_details"] ?></td>
                   
                    <td><?=$row["product_qty"]?></td>
                    <?php
                    $sqli= "SELECT * from categories where category_id= '".$row['category_id']."'";
                    $resulti=mysqli_query($conn,$sqli);
                    while($rowi= mysqli_fetch_assoc($resulti)){
                        ?>
                        <td><?=$rowi["category"]?></td>
                    <?php
                        }
                    
                    ?>
                    
                   
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
