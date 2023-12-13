

<div id="ordersBtn" >
  <h2>Order Details</h2>


  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Product</th>
        <th>OrderDate</th>
        <th >Payment Status</th>
        <th>Order Status</th>
        <th colspan="2">Action</th>
        
     </tr>
    </thead>


     <?php
      include_once "../config/dbconnect.php";
   
          $showdate= date('Y-m-d');
  
      $sql="SELECT * from orders ORDER BY order_date DESC";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $uid= $row['user_id'];
          $pid= $row['product_id'];
          
            
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <?php
          $sqli= mysqli_query($conn, "SELECT * FROM user where user_id= $uid");
          while ($rowi=$sqli-> fetch_assoc()) {?>
          <td><?=$rowi["username"]?></td>
          <?php
        }?>
        <?php
$sqlip= mysqli_query($conn, "SELECT * FROM products where product_id= $pid");
while ($rowip=$sqlip-> fetch_assoc()) {?>
          <td><?=$rowip["product_name"]?></td>
          <?php
}?>
          <td><?=$row["order_date"]?></td>
          <?php
           
                if($row["pay_status"]=='0'){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')" >Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]=='1'){
            ?>
                <td><button class="btn btn-success" >Paid </button></td>
            <?php
                }
            ?>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" >Delivered</button></td>
                <?php
                }
              
            ?>
          
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        <td><button class="btn btn-secondary"  onclick="DeleteOrders('<?=$row['order_id']?>')">Delete </button></td>
      </tr>
    <?php
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