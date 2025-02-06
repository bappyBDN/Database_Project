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
                    $_SESSION['notfound']="<div class='error'> Itemm Not Found.</div>";
                    header('location:listofuplodedIMG.php');
                }

            }
            else{
                header('location:listofuplodedIMG.php');

            }
        ?>

    <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Add IMG of products</h2>

                      </div>
                    </div>

                      <div class="container-folid border-top broder-success">
                        <form action="Add_ProductIMG.php" method="Post" enctype="multipart/form-data">
                            <table class="table">

                            <tr>
                                    <td>Company Name:</td>
                                     <td>
                                        <input type="text" name="IG_CName" value="<?php echo  $IG_CName;?>"  placeholder="Company Name">

                                     </td>

                                    </tr>


                                <tr>
                                    <td>Title:</td>
                                     <td>
                                        <input type="text" name="IG_Title"  value="<?php echo  $IG_Title;?>" placeholder="Product Title">

                                     </td>

                                    </tr>



                                    <tr>
                                        <td>OLD Image:</td>
                                        <td>
                                           <?php
                                           if($IG_Name !="")
                                           {
                                            ?>
                                            <img src="images/<?php echo $IG_Name; ?>" width="100px" height="60px" >
                                            <?php }
                                            ?>
                                         </td>

                                    </tr>
                                    <tr>
                                        <td>Select New Image:</td>
                                        <td>
                                            <input type="file" name="IG_Name">
                                            </td>

                                    </tr>
                                    <tr>
                                    <td>Price:</td>
                                     <td>
                                        <input type="number" name="IG_Price" value="<?php echo  $IG_Price;?>" placeholder="Product Price">

                                     </td>

                                    </tr>


                                    <tr>
                                    <td>Feature:</td>
                                     <td>
                                        <input <?php if($IG_Feature=="Yes"){echo "checked";} ?> type="radio" name="IG_Feature" value="Yes">Yes
                                        <input <?php if($IG_Feature=="NO"){echo "checked";} ?>type="radio" name="IG_Feature" value="No">No
                                        
                                        
                                     </td>

                                    </tr>
                                    <tr>
                                    <td>Action:</td>
                                     <td>
                                        <input <?php if($IG_Action=="Yes"){echo "checked";} ?> type="radio" name="IG_Action" value="Yes">Yes
                                        <input <?php if($IG_Action=="No"){echo "checked";} ?>type="radio" name="IG_Action" value="No">No
                                        
                                        
                                     </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                                        </td>
                                    </tr>
                            </form>

                       </div>
                 



    </div>

    <?php 
      if(isset($_POST['submit']))
      {
       // echo "Clicked";
      
       $IG_Title=$_POST['IG_Title'];
       $IG_CName=$_POST['IG_CName'];
       $IG_Price=$_POST['IG_Price'];
       $IG_Name=$_POST['IG_Name'];
       $IG_Feature=$_POST['IG_Feature'];
      $IG_Action=$_POST['IG_Action'];

     $sql2 = "update product_img set
     IG_Title = '$IG_Title',IG_CName = '$IG_CName', IG_Name== '$IG_Name',
     IG_Price= '$IG_Price' ,IG_Feature = 'IG_Feature'
     ,IG_Action = 'IG_Action' where IG_ID=$IG_ID";

     $res2 = mysqli_query($conn, $sql2);
     
     if ($conn->query($sql2) === TRUE) {
         echo "New record created successfully";
         $_SESSION['Uplode']="<div class='success'> Itemm uploded Successfully.</div>";
         header('location:listofuplodedIMG.php');
       }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    }

    ?>


              

     
     </body>

  </html>


