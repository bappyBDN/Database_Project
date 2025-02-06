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
         if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
         }
         if(isset($_SESSION['notfound'])){
            echo $_SESSION['notfound'];
            unset($_SESSION['notfound']);
         }
         if(isset($_SESSION['Uplode'])){
            echo $_SESSION['Uplode'];
            unset($_SESSION['Uplode']);
         }

       ?>

          <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">List of uploded Images</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <table class="table">
                            <tr>
                                <th>SID</th>
                                <th>Company Namae</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Images</th>
                                <th>Feathured</th>
                                <th>Action</th>
                                <th>Actions</th>



                            </tr>

                            <?php
                                $sql = "select * from product_img";

                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);

                                if($count > 0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $IG_ID=$row['IG_ID'];
                                        $IG_Title=$row['IG_Title'];
                                        $IG_CName=$row['IG_CName'];
                                        $IG_Price=$row['IG_Price'];
                                        $IG_Name=$row['IG_Name'];
                                        $IG_Feature=$row['IG_Feature'];
                                        $IG_Action=$row['IG_Action'];

                                        

                                        ?>

                                        <tr>
                                        <td> <?php echo $IG_ID ?> </td>
                                        <td> <?php echo $IG_CName ?></td>
                                        <td>
                                             <?php
                                              echo $IG_Title 
                                             ?>
                                            </td>
                                        <td> <?php echo $IG_Price ?></td>
                                        <td> 
                                            <?php 
                                            if($IG_Name!="")
                                            {
                                                ?>
                                                <img src="images/<?php echo $IG_Name; ?>" width="100px" height="60px" >

                                                <?php

                                            } 
                                            else{

                                            }
                                            ?>
                                        </td>
                                        <td> <?php echo $IG_Feature ?></td>
                                        <td> <?php echo $IG_Action ?></td>
                                        <td>
                                            <a href="update_Product.php?IG_ID=<?php echo $IG_ID; ?>" class="btn-secondary">Update_Product</a>
                                            <a href="delete_product.php?IG_ID=<?php echo $IG_ID; ?>" class="btn-danger">Delete_Product</a>

                                            </td>
                                        </tr>


                                        <?php

                                    }

                                }
                                else{

                                }

                            ?>

                           

                            </table>
                        
             
                      </div>

      
             </div>



     </body>

  </html>


