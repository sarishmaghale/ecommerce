<?php
require_once 'connection.php'; ?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/headerstyle.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

  <div class="navbar">
 
    <nav>
      <ul id="MenuItems">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contactus.html">Contact</a></li>
        <li><a href="account.php">Account</a></li>
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

</html>