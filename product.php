<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD Product </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

      <?php
      
      if(isset($_GET['P_ID'])){

         $P_ID=$_GET['P_ID'];
         $P_Name=$_GET['P_Name'];
         $P_Catagory=$_GET['P_Catagory'];
         $C_ID= $_GET['C_ID'];
         $C_Name= $_GET['C_Name'];
         $Price= $_GET['Price'];
         $Qtt= $_GET['Qtt'];
         $Ex_Date=$_GET['Ex_Date'];




        $sql = "insert into product (P_ID,P_Name,P_Catagory,C_ID,C_Name,Price,Ex_Date)
            values('$P_ID','$P_Name','$P_Catagory','$C_ID','$C_Name','$Price','$Ex_Date')";

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
                      <h2 class="text-success text-center p-2">Add Products Details</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <form action="product.php" method="GET">
                        <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Product ID:</label>
                        <input type="number" class="form-control" placeholder="Enter First Name" name="P_ID">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Products Name:</label>
                        <input type="text" class="form-control" placeholder="Enter last Name" name="P_Name">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Product Catagory:</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="P_Catagory">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Company Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Address" name="C_Name">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                 <div class="col">
                 <label for="" class="form-label">Company ID:</label>
                        <input type="number" class="form-control" placeholder="Enter phonr no" name="C_ID">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Price:</label>
                        <input type="text" class="form-control" placeholder="Proudet rate" name="Price">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Quentity:</label>
                        <input type="number" class="form-control" placeholder="Quentity" name="Qtt">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Entry Date:</label>
                            <input type="date" class="form-control" id="" placeholder="Expraied Date" name="Ex_Date">
                            
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