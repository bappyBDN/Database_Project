
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
                      <h2 class="text-success text-center p-2">List of Company</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <table class="table">
                            <tr>
                                <th> Company_ID</th>
                                <th>Company_Namae</th>
                                <th>Entry_Date</th>
                              



                            </tr>

                            <?php
                             $sql ="select * from  company";

                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);

                                if($count > 0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                                                            
                                        $Company_ID = $row["Company_ID"];
                                        $Company_Name = $row["Company_Name"];
                                        $Entry_Date = $row["Entry_Date"];
                                        ?>

                                        <tr>
                                        <td> <?php echo $Company_ID ?> </td>
                                        <td> <?php echo $Company_Name ?></td>
                                        <td>
                                             <?php
                                              echo $Entry_Date 
                                             ?>
                                            </td>
                                        <td>
                                            <a href="EditlistofCom.php?Company_ID=<?php echo $Company_ID; ?>" class="btn-secondary">Update_Product</a>
                                            <a href="EditlistofCom.php?Company_ID=<?php echo $Company_ID; ?>" class="btn-danger">Delete_Product</a>

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


  