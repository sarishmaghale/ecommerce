<?php
require_once 'connection.php';
$sql_cart = "SELECT * FROM carts WHERE user_id='" . $_SESSION['user_id'] . "'";
$all_cart = $conn->query($sql_cart);
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Home Decor Items</title>
  <link rel="stylesheet" href="css/headerstyle.css" />
  <!-- <script src="faq.js"></script> -->

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <style>
    .navbar a {
      position: relative;
      margin-right: 25px;
    }
    .navbar .sort{
      margin-right: 26px;
    }

    .navbar a span {
      position: absolute;
      width: 14px;
      height: 14px;
      top: -22%;
      right: -22%;
      background-color: black;
      color: white;
      border-radius: 50%;
      font-size: 1rem;
      padding: .05em;
      text-align: center;
    }
    select{
    border:1px solid black;
    padding: 10px 20px;
    border-radius:2px;
    width: 120px;
    
   cursor:pointer;

  }

  

  </style>
</head>

<body>

  <div class="navbar">
    <!--<div class="logo">
            <a href="index.html">
              <img style="border-radius: 80px;" src="images/gif.gif" alt="" width="150px" ></a>
          </div>-->
    <nav>
      <ul id="MenuItems">

        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li>
          <form action="search.php" method="post">
            <div class="wrap">
              <div class="search">
                <input type="text" class="searchTerm" name="search_query" placeholder="What are you looking for?">
                <button type="submit" class="searchButton" name="search">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>

          </form>
        </li>

          
       
        <!--<li><a href="faq2.html">FAQ's</a></li>-->
        <!-- TODo: 22:20 -->
      </ul>
    </nav>
    
<div class="sort">
    <form action="sort.php" method="post" id="myForm">
<select id="myDropdown" class="form-select" name="dropdown">
<option disabled selected hidden>Sort By</option>
  <option value="htl">Price high to low</option>
  <option value="lth">Price low to high</option>
  <option value="atz">Alphabetical order</option>
</select>
</form>
</div>       
            
            
          </form>
          <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
const dropdown = document.getElementById("myDropdown");

dropdown.addEventListener("change", function() {
  
  document.getElementById("myForm").submit();
});
</script>
    <a href="cart.php"><img src="../images/cart.png" alt="" width="30px" height="30px" />
      <span id="badge">
        <?php echo mysqli_num_rows($all_cart); ?>
      </span></a>
    <div class="action">
      <div class="profile" onclick="menuToggle();">
        <img src="../images/usericon.png" width="35px" height="35px" />
      </div>
      <div class="menu">
        <h3>Hello<br /><span>
            <?php echo $_SESSION['login_user'] ?>
          </span></h3>
        <ul>
          <li>
            <img src="../images/usericon.png" /><a href="#">My profile</a>
          </li>
          <li>
            <img src="../images/oders.png" /><a href="history.php">History</a>
          </li>
          <li>
            <img src="../images/sales.png" /><a href="sell.php">Sales</a>
          </li>
          <li>
            <img src="../images/messages.png" /><a href="message.php">Messages</a>
          </li>
          <li>
            <img src="../images/logout.png" /><a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- <img src="images/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
       -->
  </div>

  <!--
      <script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
      } else {
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>
  -->
</body>
<script>
  function menuToggle() {
    const toggleMenu = document.querySelector(".menu");
    toggleMenu.classList.toggle("active");
  }
</script>

</html>