<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Customer</th>
            <th>Contact No</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['orderID'];
        //echo $ID;
        $sql="SELECT * from orders 
        where order_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                $pid=$row['product_id'];
                $uid=$row['user_id'];
    ?>
                <tr>
                    <td><?=$count?></td>
                    <?php
                       $subqry="SELECT * from products
                       where product_id=$pid ";
                       $res=$conn-> query($subqry);
                       if($row2 = $res-> fetch_assoc()){
                    ?>
                    <td><img height="80px" src="<?=$row2["product_image"]?>"></td>
                    <td><?=$row2["product_name"] ?></td>
                    <td><?=$row2["product_price"] ?></td>
                    <?php
                        }

                        $subqry2="SELECT * from user 
                        where user_id=$uid";
                        $res2=$conn-> query($subqry2);
                        if($row3 = $res2-> fetch_assoc()){
                        ?>
                    <td><?=$row3["username"] ?></td>
                    <td><?=$row3["user_phone"]?></td>
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
