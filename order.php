<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD COMPANY </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

    <?php
            if(isset($_GET['IG_ID']))
            {
                $IG_ID=$_GET['IG_ID'];
                $sql="SELECT * FROM product_img WHERE IG_ID=$IG_ID";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $IG_Title=$row['IG_Title'];
                    $IG_CName=$row['IG_CName'];
                    $IG_Price=$row['IG_Price'];
                    $IG_Name=$row['IG_Name'];
                    $IG_Feature=$row['IG_Feature'];
                    $IG_Action=$row['IG_Action'];


                }
                else{
                   // $_SESSION['notfound']="<div class='error'> Itemm Not Found.</div>";
                   // header('location:index.php');
                }

            }
            else{
               // header('location:index.php');

            }
        ?>

          <div class="container "><!--start Container-->
                 <div class="row g-3">
                 
                        <div class="col">
                            <h3><label for="inputAddress" class="form-label">Product ID</label></h3>
                            <h4 class="text-primary"><?php echo $IG_ID; ?></h4>
                           
                        </div>
                        <div class="col">
                            <h3><label for="inputAddress" class="form-label">Company Name</label></h3>
                            <h4 class="text-info"><?php echo $IG_CName; ?></h4>
                           
                        </div>
                        <div class="col">
                            <h3><label for="inputAddress" class="form-label">Product Price:</label></h3>
                            <h5 class="text-danger"><?php echo $IG_Price; ?> tk</h5>
                           
                        </div>
                 </div>
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2"><h2>Order Form:</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
                            <form action="" method="GET" class="row g-3">
                            
                             <div class="row g-3">
                             <div class="col">
                              <h3> <label for="inputAddress" class="form-label">Product ID</label></h3>
                              <input type="number" name="Pro_ID" value="<?php echo $IG_ID; ?>">
                              <input type="hidden" name="C_Name" value="<?php echo $IG_CName; ?>">
                              <input type="hidden" name="Price" value="<?php echo $IG_Price; ?>">

                             <!----<input type="number" name="Pro_ID" value="" class="form-control" placeholder="PRODUCT id" aria-label="ID"> -->
                               
                            </div>
                            <div class="col">
                            <label for="inputAddress" class="form-label">Quentity:</label>

                                <input type="number" name="Qtt" value="" class="form-control" placeholder="Quentity" aria-label="ID">
                              </div>
                              <div class="col">
                            <label for="inputAddress" class="form-label">Quentity:</label>

                                <input type="number" name="Cus_ID" value="" class="form-control" placeholder="Customer_ID" aria-label="ID">
                              </div>
                            </div>

                                <div class="row p-4">
                                <div class="col">
                                <label for="inputAddress" class="form-label">CostumerName</label>

                                    <input type="text" name="Cus_Name" class="form-control" placeholder="name" aria-label="name">
                                </div>
                                <div class="col">
                                <label for="inputAddress" class="form-label">Costumer Contuct Number:</label>
                                    <input type="number"name="Cus_Con" class="form-control" placeholder="Number" aria-label="First name">
                                 </div>
                            </div>
                            <div class="form-floating">
                                 <textarea name="Cus_Add" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                 <label for="floatingTextarea2">Address</label>
                               </div>
                                <div class="d-flex justify-content-center my-4">
                                <button type="submit" name="submit" value="Confirm order" class="btn btn-primary">Submit</button>
                                 </div>
                    


                      </form>

             
                      </div>

      
             </div>
               <?php
                if(isset($_GET['submit']))
               {
                    $Pro_ID= $_GET['Pro_ID'];
                    $C_Name= $_GET['C_Name'];
                    $Price = $_GET['Price'];
                    $Qtt =$_GET['Qtt'];
                    //$Total =$Price * $Qtt;
                    $O_Date= date("Y-m-d h:i:sa");
                    $O_Status="Ordered";
                    $Cus_Name= $_GET['Cus_Name'];
                    $Cus_Con= $_GET['Cus_Con'];
                    $Cus_ID= $_GET['Cus_ID'];
                    $Cus_Add = $_GET['Cus_Add'];

                    $sql2= "insert into o_idnew_ordertb
                              (Pro_ID,C_Name,Price,Qtt,O_Date,O_Status,Cus_Name,Cus_Con,Cus_ID,Cus_Add)
                                        values('$Pro_ID','$C_Name','$Price','$Qtt','$O_Date','$O_Status','$Cus_Name','$Cus_Con','$Cus_ID','$Cus_Add')";
                                
                        if ($conn->query($sql2) === TRUE) {
                            echo "New record created successfully";
                            header('location:index.php');

                        } //else {
                            //echo "Error: " . $sql2 . "<br>" . $conn->error;
                        //}
                        
                        $conn->close();


                  
               }

               ?>



     </body>

  </html>