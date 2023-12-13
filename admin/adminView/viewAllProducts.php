


<head>
  <style>
   
    .search {
    width: 60%;
    position: relative;
    display: flex;
  }
  
  .searchTerm {
    width: 100%;
    border-radius: 50px 0 0 50px;
    background-color: #ededed;
    border-right: none;
    padding: 5px;
    height: 40px;
    padding: 0 20px;
    font-size: 15px;
   
    border: none;
    outline: none;
   text-align: center;
  }
  

  
  .searchButton {
    width: 50px;
    height: 40px;
    background-color: #c4a39e;
    text-align: center;
    color: #fff;
    border: none;
    border-radius: 0px 50px 50px 0px;
    cursor: pointer;
    font-size: 20px;
  }
  </style>
</head>
<body>
  


<form action="viewSearchedProduct.php" method="post">
            <div class="wrap">
              <div class="search">
                <input type="text" class="searchTerm" name="search_query" placeholder="What are you looking for?">
                <button type="submit" class="searchButton" name="search">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>

          </form>

          





<div >
<br/>
<button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>
  <br/>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th></th>
        <th class="text-center" colspan="2">Action</th>
        
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from products ORDER BY product_id DESC ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $sqli= "SELECT * from categories where category_id= '".$row['category_id']."'";
          $resulti=mysqli_query($conn,$sqli);
          while($rowi= mysqli_fetch_assoc($resulti)){
          

            
      
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachProduct.php?productID=<?=$row['product_id']?>" href="javascript:void(0);">View</a></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Delete</button></td>
      
      </tr>
      <?php
            $count=$count+1;
          }
        }
      }
      
      ?>
  </table>

  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form  enctype="multipart/form-data" onsubmit="addItems()"  method="POST">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="p_price" min="0" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" class="form-control" required>
                <option disabled>Select category</option>
                <?php
          $sql="SELECT * from categories ";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category'] ."</option>";
            }
          }
        ?>
 
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Quantity:</label>
              <input type="number" class="form-control" id="p_qty" min="0" required>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file" accept="image/*">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" name="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  
</div>

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Product Details</h4>
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