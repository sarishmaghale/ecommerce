<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Home Decor Items</title>
  <link rel="stylesheet" href="css/style.css" />
  <!-- <script src="faq.js"></script> -->

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <style>
    #contact {
      width: 90%;
      padding: 35px;
      margin-left: 60px;
      display: flex;
      box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);

    }

    #contact .cntct {
      margin-left: 30px;
      margin-right: 60px;
    }

    #contact input {
      width: 50%;
    }

    #imgContact img {
      margin-left: 80px;
      width: 450px;
      height: 400px;
    }

    #btnContact {
      border-radius: 20px;
      background-color: black;
      color: white;

    }
  </style>

</head>

<body>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
      var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/60a6d612185beb22b30f4749/1f65r8ej2';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

  <div class="header">
    <?php
    require_once 'connection.php'; ?>
    <div class="container">



      <div class="row">
        <div class="col-2">
          <h1>
            Give your taste<br />
            an aesthetic sense!
          </h1>
          <p>
            Creativity in every explosion innovates you,<br />
            Innovate your home, shaping your need to meet the future.
          </p>
          <a href="products.php" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
          <!-- <img src="images/image1.png" alt="" /> -->
          <img src="../images/hmp.png">
        </div>
      </div>
    </div>
  </div>


  <!----- Featurd Products--------->
  <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
      <div class="col-4">
        <a href="products_dt.php?pid=43">
          <img src="../images/product-1.jpg" style="height:8cm" alt="" /></a>
        <h4>Lounger Armchair</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>Rs.2500</p>
      </div>

      <div class="col-4">
        <a href="products_dt.php?pid=44"><img src="../images/product-2.jpg" style="height:8cm" alt="" /></a>
        <h4>Antique Wall Lamp</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-half-o"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>Rs.2990</p>
      </div>

      <div class="col-4">
        <a href="products_dt.php?pid=2"><img src="../images/product-3.jpg" style="height:8cm" alt="" /></a>
        <h4>Boho Themed Wall Mirror</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-half-o"></i>
        </div>
        <p>Rs.1500</p>
      </div>
      <div class="col-4">
        <a href="products_dt.php?pid=45"><img src="../images/product-4.jpg" style="height:8cm" alt="" /></a>
        <h4>Abstract Wall Paintings</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>Rs.1250</p>
      </div>
    </div>


    <div class="categories">
      <div class="small-container">
        <h2 class="title">SERVICES WE OFFER</h2>
        <div class="row">
          <div class="col-3">
            <img src="../images/category2.jpg" style="height:8cm" alt="" />
            <h3 style="text-align: center;">QUALITY ASSURANCE</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus dignissimos illum, iure saepe animi
              nulla ratione cupiditate molestiae eos asperiores explicabo impedit maxime in nobis officiis provident
              esse dicta aliquam.</p>
          </div>
          <div class="col-3">
            <img src="../images/category1.jpg" style="height:8.2cm" alt="" />
            <h3 style="text-align: center;">BECOME A SELLER</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque et magni maiores sint dolorem iste
              assumenda natus alias eos eius nam voluptates neque hic, commodi necessitatibus dolor. Nulla, eveniet qui.
            </p>
          </div>

          <div class="col-3">
            <img src="../images/category3.jpg" style="height:8cm" alt="" />
            <h3 style="text-align: center;">CONSULTATION</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nostrum ducimus eius, quaerat iusto
              delectus itaque. Reprehenderit iusto, ea ducimus corporis consequuntur dolorem. Nulla dolore quam sequi.
              Natus, minima corporis.</p>
          </div>
        </div>
      </div>
    </div>





    <!-- LATEST PRODUCT SECTION -->

    <!--<h2 class="title">Latest Products</h2>
      <div class="row">
        <div class="col-4">
          <a href="pd_antique-table.html"><img src="images/antique1.png" alt="" /></a>
          <h4>Antique Table</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$100.00</p>
        </div>

        <div class="col-4">
          <a href="pd_modern-couch.html"><img src="images/mcouch1.png" alt="" /></a>
          <h4>Modern Couch</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$500.00</p>
        </div>

        <div class="col-4">
          <a href="pd_toska-armchair.html"><img src="images/toskaarm1.png" alt="" /></a>
          <h4>Toska ArmChair</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          <p>$350.00</p>
        </div>
        <div class="col-4">
          <a href="pd_wolfrokoko.html"><img src="images/aarmchair1.png" alt="" /></a>
          <h4>Wolf Rokoko-Arm Chair</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
         
        </div>
      </div>
    </div>
  -->

    <!-------- Offer --------->
    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <div class="sub_header">
              <div class="slider">
                <ul class="slides">
                  <li class="slide"><img src="../images/img1.jpg" width="300px" height="400px" alt="" /></li>
                  <li class="slide"><img src="../images/img2.jpg" width="300px" height="400px" alt="" /></li>
                  <li class="slide"><img src="../images/img3.jpg" width="300px" height="400px" alt="" /></li>
                </ul>
              </div>



            </div>
            <script src="jquery.min.js"></script>
            <script>
              var currentSlide = 1;
              var $slider = $(".slides");
              var slideCount = $slider.children().length;
              var slideTime = 2000;
              var animationTime = 1000;

              setInterval(function () {
                $slider.animate({
                  marginLeft: '-=300px'
                }, animationTime, function () {
                  currentSlide++;
                  if (currentSlide == slideCount) {
                    currentSlide = 1;
                    $(this).css("margin-left", "0px");
                  }
                })
              }, slideTime);
            </script>
          </div>
          <div class="col-2">
            <p>Exclusively available on Decor My Way</p>
            <h1>Local handicrafts from local people</h1>

            <a href="productsbycategory.php?category=7" class="btn">Buy Now &#8594;</a>
          </div>
        </div>
      </div>
    </div>

  
  </div>
 




  
  <section id="Usersale">
    <div class="seller">
      <h4>Sign up to sale your handicrafts</h4>
      <p>Showcase your skills with your best products on our website.</p>
    </div>
    <div class="form">
      <input type="text" placeholder="your email address" name="" id="">
      <button class="normal">Sign Up</button>
    </div>
  </section>




  <!-- Footer -->
  <footer id="footer">
    <center>
      <h1 class="text-center">Decor My Way</h1>
      <p class="text-center">Give your taste an aesthetic sense</p>
      <div class="icons text-center">
        <i class="bx bxl-twitter"></i>
        <i class="bx bxl-facebook"></i>
        <i class="bx bxl-google"></i>
        <i class="bx bxl-skype"></i>
        <i class="bx bxl-instagram"></i>
        <p class="text-center">Contact:90790860767/ djashfuysg@gmail.com</p>

      </div>
    </center>


  </footer>
  <!-- footer -->




  <!-- JS for Toggle menu -->
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


  <script type="text/javascript" src="script.js"></script>




</body>

</html>