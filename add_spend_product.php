<?php
  require('connection.php');
  require('my_function.php');

?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD Spent Product </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

      <?php
      
      if(isset($_GET['spend_product_name'])){

         $spend_product_name=$_GET['spend_product_name'];
         $spend_product_quentity=$_GET['spend_product_quentity'];
         $spend_product_entry_date=$_GET['spend_product_entry_date'];
         $store_product_id=$_GET['store_product_id'];
        
        $sql = "insert into spend_product (spend_product_name,spend_product_quentity,store_product_id,spend_product_entry_date)
            values('$spend_product_name','$spend_product_quentity','$store_product_id','$spend_product_entry_date')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
              
              $conn->close();


      }
      

       ?>

<div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Add Spend Products Details</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <form action="add_spend_product.php" method="GET">
                        <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Product Quantity:</label>
                        <input type="number" class="form-control" placeholder="Enter Product Quantity" name="spend_product_quentity">
                        </div>

                        <div class="col">
                        <label for="" class="form-label">Product ID:</label>
                        <input type="number" class="form-control" placeholder="Enter Store Product ID" name="store_product_id">
                        </div>
                        
                 </div>
                 
                 <div class="row m-3">
                 <div class="col">
                <label for="P_Catagory" class="form-label">Product Category:</label>
                 <select class="form-control" name="spend_product_name" id="spend_product_name">
                 <option value="" disabled selected>Select a category</option>
                <?php data_list('product',  'P_Name','P_Name'); ?>
                 </select>
               
                 
                 <div class="row m-3">
                 <div class="col">
                 <label for="" class="form-label">Product Entry Date</label>
                        <input type="date" class="form-control" placeholder="Enter phonr no" name="spend_product_entry_date">
                        </div>
                        
                 </div>
                <div class="d-flex justify-content-center my-4">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                        </form>
             
                      </div>

      
             </div>













       

     </body>

  </html>