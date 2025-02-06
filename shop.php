<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'supershop_db';

// Create connection
 $conn = new mysqli($servername, $username, $password, $database);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>
<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" contant = "width=device-width,initial-scale=1.0">
        <title> Onlinr Shop</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="CSS/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
    <script src="script.js"></script>
    
    <!-- Navbar start -->
    <section id="header">
        <h4>Fashion World</h4>
        <!-- <a href="#"><img src="images/logo.png" class="logo" alt=""></a> -->
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </section>
    
    <section class="shop-header">
        <h2>Let's Shop</h2>
        <p>Save money</p>
    </section>
    
    <section id="product1" class="section-p1">
    <div class="pro-container">

        <?php 
        $sql = "SELECT * FROM product_img WHERE IG_Action='Yes' AND IG_Feature='Yes'";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $IG_ID = $row['IG_ID'];
                    $IG_Title = $row['IG_Title'];
                    $IG_CName = $row['IG_CName'];
                    $IG_Price = $row['IG_Price'];
                    $IG_Name  = $row['IG_Name'];
        ?>
            <div class="pro" onclick="window.location.href='sproduct.html';">
                <?php
                if($IG_Name=="")
                {
                    echo "Image not availavale";
                }
                else{
                    ?>
                     <img src="images/<?php echo $IG_Name; ?>" alt="">
                     <?php
                }
                ?>
               
                <div class="des">
                    <h3><?php echo $IG_ID; ?></h3>
                    <span><?php echo $IG_CName; ?></span>
                    <h6><?php echo $IG_Title; ?></h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3><?php echo $IG_Price; ?></h3>
                </div>
                <a href="order.php?IG_ID=<?php echo $IG_ID; ?>"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
      
        <?php
                }
            } else {
                echo "<div class='error'>Product not available.</div>";
            }
        } else {
            echo "<div class='error'>Failed to execute query: " . mysqli_error($conn) . "</div>";
        }
        ?>
     </div>
 </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

    <footer class="section-p1">
        <div class="col">
            <h4>Fashion World</h4>
            <!-- <a href="#"><img src="images/logo.png" class="logo" alt=""></a> -->
            <h4>Contact</h4>
            <p><strong>Address:</strong> Dhanmondi 9/A, Dhaka, Bangladesh</p>
            <p><strong>Phone:</strong> 01797127296, 01973336948</p>
            <p><strong>Hours:</strong> 8:00-22:00, Fri-Sat</p>
            <div class="follow">
                <h3>Follow Us</h3>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms and Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="userlogin.php">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Points</a>
            <a href="#">Track Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Payment Method</h4>
            <img src="images/pay.png" alt="">
        </div>
    </footer>
</body>
</html>