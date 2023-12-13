
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Username</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Details</th>
            <th>Contact Number</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['requestID'];
        //echo $ID;
        $sql="SELECT * from requests
        where req_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                
                $uid=$row['user_id'];
    ?>
                <tr>
                    <td><?=$count?></td>
                    <?php
                       $subqry="SELECT * from user
                       where user_id=$uid ";
                       $res=$conn-> query($subqry);
                       if($row2 = $res-> fetch_assoc()){
                    ?>
                    <td><?=$row2["username"] ?></td>
                    <td><img height="80px" src="<?=$row["product_image"]?>"></td>
                    <td><?=$row["product_name"] ?></td>
                    <td><?=$row["product_price"] ?></td>
                    <td><?=$row["product_qty"] ?></td>
                    <td><?=$row["product_details"] ?></td>
                    <td><?=$row2["user_phone"]?></td>
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
