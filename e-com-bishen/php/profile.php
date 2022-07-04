<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Profile</title>
</head>
<body>
    <!-- navbar section ========= -->
    <div class="container">
        <div class="navbar">
          <div class="logo">
            <a href="index.html"><h2 width="110px" style="font-family:wide latin; color: rgb(172, 32, 32);">BISHEN</h2></a>
          </div>
          <nav>
            <ul id="menuItems">
              <li><a href="../html/index.html">Home</a></li>
              <li><a href="../html/products.html">Products</a></li>
              <li><a href="../html/Contact.html">Contact</a></li>
              <li><a href="../php/profile.php">Account</a></li>
            </ul>
          </nav>
          <!-- <a href="../html/Account.php"><img src="..//images/cart.png" width="27px" height="27px" /></a> -->
          <img src="..//images/menu.png" class="menu-icon" onclick="menutoggle()"/>
        </div>
      </div>
      <?php
        include("../php/cont_db.php");
        session_start();
        $email = $_SESSION['email'];
        $selpro = "Select * from user_db where email='$email'";
        $selpro_run = mysqli_query($cont,$selpro);
        $selpro_fet = mysqli_fetch_array($selpro_run);
        if($selpro_fet>0){
      ?>

      <!-- name and pic section  -->
    <div class="f-container">
        <div class="sub-f-cont" style="align-items:center;">
            <div class="pro-img" style="background-image: url('<?php echo $selpro_fet['img'] ?>');">
                <!-- <img src="../images/product-1.jpg" alt=""> -->
            </div>
            <div class="name"><?php echo $selpro_fet['name']; ?></div>
        </div>
        <!-- <div class="name-edit">.</div> -->
        
    </div>

    <div class="email-cont">
      <table>
        <tr>
          <td>E-mail : </td>
          <td><?php echo $selpro_fet['email']; ?></td>
        </tr><br>
        <tr>
          <td> Mobile number : </td>
          <td><?php echo $selpro_fet['mnum']; ?></td> 
        </tr>
      </table>
    </div>
    <?php
    }
    else{
      echo "sorry data is not found";
      header("location:../html/Account.php");
    }
    ?>
    <br>

    <!-- add product  -->
    <div class="s-cont">
      <a href="../html/Cart.html" ><div class="product">
        <!-- &nbsp;&nbsp;&nbsp;&nbsp;<img src="..//images/cart.png" width="27px" height="27px" /> -->
        <h3>&nbsp;&nbsp;&nbsp;Cart &nbsp;&nbsp;&nbsp; </h3>
      </div></a>
      <div class="product" onclick="edVisi()">
        <h3>Edit Profile</h3>
      </div>&nbsp;
      <div class="product">
        <form action="" method="post">
        <h3 ><input type="submit" name="log_out" id="logout" value="Log out"></h3></form>
      </div>
    </div>

    <!-- =========edit profie pop =========== -->
      <div class="ep-container" id="ep_close">
        <div class="ep-sub-cont">
          <h1>Edit Your Profile</h1>
          <form action="" method="post">
            <span>Name</span><br>
            <input type="text" name="ed_name" value="<?php echo $selpro_fet['name']; ?>" required><br><br>
            <span>Email</span><br>
            <input type="email" name="ed_email" value="<?php echo $selpro_fet['email']; ?>" required><br><br>
            <span>Mobile Number</span><br>
            <input type="text" name="ed_mnum" value="<?php echo $selpro_fet['mnum']; ?>"><br>
            <small id="erem" ></small><br>
            <input type="button" name="" id="ep-save" value="Close" onclick="edClose()">
            <input type="submit" name="ep_submit" id="ep-save" value="Save">
          </form>
        </div>
      </div>
    <?php
      if(isset($_POST['ep_submit'])){
        $ed_name = $_POST['ed_name'];
        $ed_email = $_POST['ed_email'];
        $ed_mnum = $_POST['ed_mnum'];

        $check_email= "select mnum from user_db where mnum='$ed_mnum'";
        $fire_check_email = mysqli_query($cont, $check_email);
        $fetech_email= mysqli_fetch_array($fire_check_email);
        if(mysqli_num_rows($fetech_email)>0){
          ?>
          <script>
            document.getElementById('erem').innerHTML="This Number is already taken. Try another";
          </script>
          <?php
        }else{
          $up_pro = "update user_db set name='$ed_name', email='$ed_email', mnum='$ed_mnum' where email='$email'";
          $up_run = mysqli_query($cont,$up_pro);
        }
      }

    ?>




    <?php
      if(isset($_POST['log_out'])){
        session_start();
        session_destroy();
        header("location:../html/Account.php");
      }
    ?>
    <script src="../javascript/profile.js"></script>
</body>
</html>