<div id="ordersBtn" >
  <h2>Requests Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>R.N.</th>
        <th>Username</th>
        <th>Product name</th>
        <th colspan="2">Status</th>
        <th colspan="2">Action</th>
        
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
     
      $sql="SELECT * from requests";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            $sqli="SELECT * FROM user where user_id= '".$row['user_id']."'";
            $resulti=$conn->query($sqli);
            while($rowi=$resulti->fetch_assoc()){
          
          
            
    ?>
       <tr>
       <td><?=$count?></td>
          <td><?=$rowi["username"]?></td>
         
       
          <td><?=$row["product_name"]?></td>
         
           <?php 
                if($row["request_status"]==0){
                  
                            
            ?>
                <td><button class="btn btn-success">Accepted </button></td><td></td>
                
            <?php
                        
                }else if($row["request_status"]==1){
            ?>
                <td><button class="btn btn-danger" >Declined</button></td><td></td>
               
                <?php
                }else{
?>
<td><button class="btn btn-success" onclick="ApproveRequestStatus('<?=$row['req_id']?>')">Approve</button></td>
<td><button class="btn btn-danger" onclick="DeclineRequestStatus('<?=$row['req_id']?>')">Decline</button></td>
<?php
                }
            
            ?>
          
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachRequest.php?requestID=<?=$row['req_id']?>" href="javascript:void(0);">View</a></td>
        <td><button class="btn btn-secondary"  onclick="DeleteRequestStatus('<?=$row['req_id']?>')">Delete </button></td>
        </tr>
    <?php
    $count=$count+1;
          }
        }
    }
      
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>
 <?php


 $check="SELECT * from requests
 where not exists (
   select * from products where requests.product_name = products.product_name AND requests.product_price = products.product_price AND
   requests.product_details = products.product_details AND requests.product_image = products.product_image AND requests.category_id = products.category_id
 )";
       $result=$conn-> query($check);
       if($result){
      if ($result-> num_rows > 0){
 while($fetch= mysqli_fetch_assoc($result)){
  $id=$fetch['req_id'];
  $uid=$fetch['user_id'];
$data="SELECT * FROM requests where req_id = '$id' ";
 $re=$conn-> query($data);
       if($re){
      if ($re-> num_rows > 0){
 while($fe= mysqli_fetch_assoc($re)){
$req_stat=$fe['request_status'];

    if($req_stat=='0'){
      $insert=mysqli_query($conn, "INSERT INTO products(product_name, product_price, product_image, product_details, category_id, product_qty,upload_type)
      VALUES ('".$fe['product_name']."','".$fe['product_price']."','".$fe['product_image']."',
      '".$fe['product_details']."','".$fe['category_id']."','".$fe['product_qty']."','$id')");
      if($insert){
        $last_id = mysqli_insert_id($conn);
       $seller=mysqli_query($conn, "INSERT INTO seller (user_id, product_id, req_id) VALUES ('$uid', '$last_id', '$id')");
        $sql1="SELECT * FROM products";
             $res1=mysqli_query($conn,$sql1);

             if(!$res1)
             {
                 echo "error ".mysqli_error($conn);
             }
        
        
             while($row=mysqli_fetch_assoc($res1))
             {
                 $sound=" ";
                 if($row['product_name']!=null)
                 {
                      $words=explode(" ",$row['product_name']);
                      foreach($words as $word)
                      {
                         $sound.=metaphone($word)." ";
                      }
                 }
                 if($row['product_details']!=null)
                 {
                      $words=explode(" ",$row['product_details']);
                      foreach($words as $word)
                      {
                         $sound.=metaphone($word)." ";
                      }
                 }
                 if($row['category_id']!=null)
                 {
                    $sqlc="SELECT * FROM categories where category_id='".$row['category_id']."'";
             $resc=mysqli_query($conn,$sqlc);
             while($rowc=mysqli_fetch_assoc($resc))
             {
                if($rowc['category']!=null)
                {

                     $words=explode(" ",$rowc['category']);
                     foreach($words as $word)
                     {
                        $sound.=metaphone($word)." ";
                     }
                 }
                }
            }
        
                 $id=$row['product_id'];
                 $sql2="UPDATE products SET indexing='$sound' WHERE product_id=$id";
                 $res2=mysqli_query($conn,$sql2);
                 if(!$res2)
                 {
                     echo mysqli_error($conn);
                 }
             }
       
      }
      else{
        echo'<script> alert("ERROR!!!")</script>';
      }
    }
  }
}
 
}
      }
    }}
    else{
      echo '<script> alert("ERROR!!!")</script>';
    }
 ?>