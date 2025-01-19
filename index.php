<?php
  require('connection.php');
?>
 <?php
         if(isset($_SESSION['notfound'])){
            echo $_SESSION['notfound'];
            unset($_SESSION['notfound']);
         }
         if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset($_SESSION['order']);
         }
         ?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>Super Shop </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      

    </head>
    <body>
        <div class="container"><!--start Container-->
         <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
            <div class="row">
                <div class="col-sm-9">
                <h2 class="text-success">Super Shop Admin Panal</h2>

                </div>

                <div class="col-sm-3">
                <p class="pt-3">Bappy Nath Joy
                     <a href="#" class="text-white text-decoration-none btn-success py-1 px-3 m-0">Logout</a></p>

                </div>
            </div> 
            </div><!--end of topbar-->
            <div class="container-folid"><!--Hero Start-->
                <div class="row"><!--Row-->
                    <div class="col-sm-4 bg-light p-0 m-0"><!--Left ber-->
                        <h5 class="bg-info text-white px-2 py-1">Company</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="AddCompany.php" class="text-dark text-decoration-none">
                                    Add Company</a>
                                </li>
                            <li class="list-group-item">
                            
                                <a href="listofcom.php" class="text-dark text-decoration-none">
                                    Company list</a>
                                </li>
                        </ul>

                        <h5 class="bg-info text-white px-2 py-1">Products</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="product.php" class="text-dark text-decoration-none">
                                    Add Product</a>
                                </li>
                            <li class="list-group-item">
                            
                                <a href="listOfProduct.php" class="text-dark text-decoration-none">
                                    Products list</a>
                                </li>

                                <li class="list-group-item">
                                <a href="Add_ProductIMG.php" class="text-dark text-decoration-none">
                                     Product img</a>
                                </li>
                            <li class="list-group-item">
                            
                                <a href="OrderList.php" class="text-dark text-decoration-none">
                                    Orders of product</a>
                                </li>
                                <li class="list-group-item">
                            
                                <a href="storeAndSpandPro.php" class="text-dark text-decoration-none">
                                    Store And Spand Product</a>
                                </li>
                        </ul>


                        <h5 class="bg-info text-white px-2 py-1">Employee</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="AddEmployee.php" class="text-dark text-decoration-none">
                                    Add Employee</a>
                                </li>
                            <li class="list-group-item">
                            
                                <a href="listOfemployee.php" class="text-dark text-decoration-none">
                                    Emloyee list</a>
                                </li>
                        </ul>


                        <h5 class="bg-info text-white px-2 py-1">Customer</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="customer.php" class="text-dark text-decoration-none">
                                    Customer ADD</a>
                                </li>
                            <li class="list-group-item">
                            
                                <a href="listOfcustomer.php" class="text-dark text-decoration-none">
                                    Customer List</a>
                                </li>
                                <li class="list-group-item">
                            
                            <a href="searchCustomerInfo.php" class="text-dark text-decoration-none">
                                Customer Details</a>
                            </li>
                        </ul>

                    </div><!--End of Left side-->

                    <div class="col-sm-8">
                        <div class="row">
                                     <div class="col-sm-4 bg-light p-4 m-4"><!--Left ber-->
                                            <h5 class="bg-info text-white px-2 py-1">Shop</h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="shop.php" class="text-dark text-decoration-none">
                                                        MY Shop</a>
                                                    </li>

                                            </ul>
                                     </div>

                                     <div class="col-sm-4 bg-light p-4 m-4"><!--Left ber-->
                                            <h5 class="bg-info text-white px-2 py-1">Orders</h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="OrderList.php" class="text-dark text-decoration-none">
                                                        Total Order</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                    <a href="OrderAndCustomer.php" class="text-dark text-decoration-none">
                                                    Customer Order</a>
                                                    </li>

                                            </ul>
                                     </div>
                                     <div class="col-sm-4 bg-light p-4 m-4"><!--Left ber-->
                                            <h5 class="bg-info text-white px-2 py-1">Product Info:</h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="add_store_product.php" class="text-dark text-decoration-none">
                                                        Login</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                    <a href="login/assets/pages/login.php" class="text-dark text-decoration-none">
                                                        Sold Product</a>
                                                    </li>

                                            </ul>
                                     </div>
                                     <div class="col-sm-4 bg-light p-4 m-4"><!--Left ber-->
                                            <h5 class="bg-info text-white px-2 py-1">Report </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="quantity_check.php" class="text-dark text-decoration-none">
                                                        Report</a>
                                                    </li>

                                            </ul>
                                     </div>

                         </div>
                             
                         <div class="row">     
                        
                        </div>  

                       <div class="row">     
                           <?php
                           include 'listofuplodedIMG.php';

                           ?>
                        </div>  



                    </div><!--End of right side-->

                    

                  </div><!--end of Row-->
      
            
            </div><!--End of Hero-->

            <div class="container-folid border-top broder-success"><!--Footer Start-->
              
             <p class="text-center p-2 bg-danger">Copyright:  Bappy Deb Nath </p>
            
            </div><!--footer End-->




        </div><!--End of Container-->






     </body>

  </html>