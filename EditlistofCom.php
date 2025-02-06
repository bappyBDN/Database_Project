<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>Edit list of company </title>

    </head>
    <body>
    <?php
            if(isset($_GET['Company_ID']))
            {
                $Company_ID=$_GET['Company_ID'];
                $sql="SELECT * FROM company  WHERE Company_ID =$Company_ID";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $Company_ID = $row['Company_ID'];
                    $Company_Name = $row['Company_Name'];
                    $Entry_Date = $row['Entry_Date'];
          

                }
                else{
                    //$_SESSION['notfound']="<div class='error'> Itemm Not Found.</div>";
                    //header('location:listofuplodedIMG.php');
                }

            }
            else{
                header('location:listofcom.php');

            }
        ?>
       <form action="EditlistofCom.php" method="GET">

         <h4>Company ID:</h4><br>
          <input type="number" name="Company_ID" value="
          <?php 
           echo $Company_ID;
          ?>"
          > <br><br>

          <h4>Company Name:</h4><br> 
          <input type="text" name="Company_Name" value="
          <?php 
           echo $Company_Name;
          ?>"
          ><br><br>

          <h4>Entry Date:</h4><br>
          <input type="date" name="Entry_Date"
          value="
          <?php 
           echo $Entry_Date;
          ?>"
          ><br><br>
          <input type="submit" name="submit"  value="Update">

       </form>

       
    <?php 
      if(isset($_POST['submit']))
      {
       // echo "Clicked";
      
       
       $Company_ID = $row['Company_ID'];
       $Company_Name = $row['Company_Name'];
       $Entry_Date = $row['Entry_Date'];


     $sql2 = "Update company set
          Company_ID='$Company_ID',
          Company_Name='$Company_Name',
          Entry_Date='$Entry_Date' 
          where Company_ID= $Company_ID";

     $res2 = mysqli_query($conn, $sql2);
     
     if ($conn->query($sql2) === TRUE) {
         echo "New record created successfully";
         //$_SESSION['Uplode']="<div class='success'> Itemm uploded Successfully.</div>";
         header('location:listofcom.php');
       }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    }

    ?>

     </body>

  </html>