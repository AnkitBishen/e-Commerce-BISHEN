<?php include("../php/cont_db.php")      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account | E-commerce</title>
    <!-- fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- css custom file -->
    <link rel="stylesheet" href="../css/Account.css" />
    <!-- javascript custom file -->
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="../html/index.html"><h2 width="110px" style="font-family:wide latin; color: rgb(172, 32, 32);">BISHEN</h2></a>
        </div>
        <nav>
          <ul id="menuItems">
            <li><a href="../html/index.html">Home</a></li>
            <li><a href="../html/products.html">Products</a></li>
            <li><a href="./html/Contact.html">Contact</a></li>
            <li><a href="../php/profile.php">Account</a></li>
          </ul>
        </nav>
        <!-- cart
        <a href="./Account.php"><img src="..//images/cart.png" width="27px" height="27px" /></a> -->
        <img src="..//images/menu.png" class="menu-icon" onclick="menutoggle()"/>
      </div>
    </div>

    <!-- Account page -->
    <div class="account-page">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="../images/image1.png" width="100%" />
          </div>
          <div class="col-2">
            <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                 <hr id="Indecator">
              </div>
              <!-- ======== login from ============ -->
              <form id="LoginForm" method="post">
                <input type="text" placeholder="Username/email" name="luname" required/>
                <input type="password" placeholder="password" name="lpass" required/>
                <input type="submit" class="btn" name="login" value="Log in">
                <a href="#">Forget Password</a>
                <p id="showlog"></p>
              </form>
                <?php
                    if(isset($_POST['login'])){
                      $luname = $_POST['luname'];
                      $lpass = $_POST['lpass'];
                      $crylpass = sha1($lpass);
                      $selquery = "select * from user_db where email='$luname' and pass='$crylpass'";
                      $selrun = mysqli_query($cont, $selquery);
                      $pk=mysqli_fetch_array($selrun);
                      if($pk>0){
                        session_start();
                        $_SESSION['email']=$luname;
                        header("location:../php/profile.php");
                      }
                      else{
                        ?>
                        <script>
                          document.getElementById('showlog').innerHTML="You are not Registered";
                        </script>
                        <?php
                      }
                    }
                ?>

              <!-- registration form ========= -->
              <form id="RegForm" method="post" name="myregis" onsubmit="return regisValid()">
                <input type="text" placeholder="Name" name="rname" onkeyup="inpvalid()" id="inpRname"/>
                <input type="email" placeholder="E-mail" name="remail" onkeyup="inpvalid()" id="inpRemail"/>
                <input type="password" placeholder="Password" name="rpass" onkeyup="inpvalid()" id="inpRpass"/>
                <input type="submit" class="btn" name="regis" value="Register"></input>
                <p id="showreg"></p>
                <p id="showRname"></p>
                <p id="showRemail"></p>
                <p id="showRpass"></p>
              </form>
              <?php
                    if(isset($_POST['regis'])){
                      $rname = $_POST['rname'];
                      $remail = $_POST['remail'];
                      $rpass = $_POST['rpass'];
                      $crypass = sha1($rpass);
                      $insquery = "insert into user_db values('$rname','$remail','$crypass','','')";
                      $insrun = mysqli_query($cont, $insquery);
                      if($insrun){
                        ?>
                        <script>
                          document.getElementById('showreg').innerHTML="You are successfully Regisered and <br> Please Login with your username and password";
                        </script>
                        <?php
                      }
                      else{
                        ?>
                        <script>
                          document.getElementById('showreg').innerHTML="User is already Registered";
                        </script>
                        <?php
                      }
                    }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- --------- footer -------------- -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>Downlad Our App</h3>
            <p>Downlad App for Android and ios mobile.phone.</p>
            <div class="app-logo">
              <img src="..//images/play-store.png" alt="" />
              <img src="..//images/app-store.png" alt="" />
            </div>
          </div>
          <div class="footer-col-2">
            <h2 width="110px" style="font-family:wide latin; color: rgb(172, 32, 32);">BISHEN</h2>
            <p>
              Our purpose Is TO Sustainably <br />
              Make the Pleasure and Benefits <br />
              of Sports Accessible to the Many.
            </p>
          </div>
          <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
              <li>Coupons</li>
              <li>Blog Post</li>
              <li>Return</li>
              <li>Join Affiliate</li>
            </ul>
          </div>
          <div class="footer-col-4">
            <h3>Social media Links</h3>
            <ul>
              <li>Follow us</li>
              <li>facebook</li>
              <li>Twitter</li>
              <li>Instagram</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2022 -BISHEN All Rights Reserved</p>
      </div>
    </div>

    <script src="../javascript/Account.js"></script>
  </body>
</html>
