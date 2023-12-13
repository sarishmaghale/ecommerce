<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style1.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
<?php
    require_once 'connection.php'; 
    ?>
  <div class="header">
    

    <div class="container">


      <div class="row">
        <div class="content">
          <!-- <img src="images/image1.png" alt="" /> -->
          <img src="../images/hmp.png">
        </div>

        <div class="content">
          <div class="wrapper">
            <form action="connection.php" id="login-side" class="form" method="POST">
              <div id="form1">
                <h1>Login Form</h1>

                <div class="input-icons">
                  <i class="fa fa-envelope icon"></i>
                  <input type="email" name="email" placeholder=" &nbsp;&nbsp; Enter your email" required
                    class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-lock icon"></i>
                  <input type="password" name="password" placeholder=" &nbsp;&nbsp; Enter your password" required
                    class="input-field">
                </div>

                <button type="submit" name="login">Login</button>
                <p class="switch-animation">Don't have a account?<br />
                  <a href="#">Sign Up</a>
                </p>
              </div>
            </form>

            <form action="connection.php" id="signup-side" class="form" method="POST">
              <div id="form2">
                <h1>Signup Form</h1>

                <div class="input-name">
                  <i class="fa fa-user icon"></i>
                  <input type="text" name="name" placeholder="&nbsp;&nbsp; Enter your  name" required
                    class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-phone icon"></i>
                  <input type="tel" name="phone" pattern="[0-9]{10}" placeholder="&nbsp;&nbsp; Enter your phone number"
                    required class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-map-marker icon"></i>
                  <input type="text" name="address" placeholder="&nbsp;&nbsp; Enter your address" required
                    class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-envelope icon"></i>
                  <input type="email" name="email" placeholder="&nbsp;&nbsp;&nbsp; Email" required class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-lock icon"></i>
                  <input type="password" name="password" placeholder="&nbsp;&nbsp; Password" required
                    class="input-field">
                </div>

                <div class="input-icons">
                  <i class="fa fa-lock icon"></i>
                  <input type="password" name="cpassword" placeholder="&nbsp;&nbsp; Confirm password" required
                    class="input-field">
                </div>
                <button type="submit" name="register">Sign Up</button>
                <p class="switch-animation">Already have an account?<br />
                  <a href="#">Login</a>
                </p>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="jquery.js"></script>

</body>

</html>