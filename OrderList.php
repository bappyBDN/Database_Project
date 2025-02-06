
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
        
       ?>

          <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Total Order</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <table class="table">
                            <tr>
                                <th>OrderID</th>
                                <th>ProductID</th>
                                <th>Comp Name</th>
                                <th>Order Date</th>
                                <th>Price<th>
                                <th>Quentity</th>
                                <th>CustomerName</th>
                                <th>Cont No</th>
                                <th>Address</th>
                                <th>status</th>

                              



                            </tr>

                            <?php
                             $sql ="select * from  o_idnew_ordertb";

                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);

                                if($count > 0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                                                            
                                            $O_ID= $row['O_ID'];
                                            $Pro_ID= $row['Pro_ID'];
                                            $C_Name= $row['C_Name'];                                         
                                            $O_Date= $row['O_Date'];
                                            $Price = $row['Price'];
                                            $Qtt =$row['Qtt'];
                                            $Cus_Name= $row['Cus_Name'];
                                            $Cus_Con= $row['Cus_Con'];
                                            $Cus_Add = $row['Cus_Add'];
                                            $O_Status=$row['O_Status'];
                                        ?>

                                        <tr>
                                        <td> <?php echo $O_ID ?> </td>   
                                        <td> <?php echo $Pro_ID ?> </td>
                                        <td> <?php echo $C_Name ?></td>
                                        <td>
                                        <td> <?php echo $O_Date ?></td>
                                             <?php
                                              echo $Price
                                             ?>
                                            </td>
                                            <td> <?php echo $Qtt?> </td>
                                           
                                            <td> <?php echo $Cus_Name ?> </td>
                                            <td> <?php echo $Cus_Con ?></td>
                                            <td> <?php echo $Cus_Add?> </td>
                                            <td class="btn-danger"> <?php echo $O_Status?></td>
                                       
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


  