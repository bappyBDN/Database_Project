<?php
  require('connection.php');
?>

<?php
   // require('connection.php');
   //echo "Delete Page";


   if(isset($_GET['IG_ID']))
   {
    $IG_ID=$_GET['IG_ID'];
    //$IG_Name=$_GET['IG_Name'];
      /*if($IG_Name !="")
    {
       $path="images/".$IG_Name;
       $remove =unlike($path);
       if($remove==false){
        echo "Error";
        header('location:listofuplodedIMG.php');
        die();

       }
    }
    $sql="DELETE FROM product_img where IG_ID =$IG_ID ";
    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Delete Itemm Successfully.</div>";
        header('location:listofuplodedIMG.php');
    }
    else{
        $_SESSION['delete']="<div class='error'>Delete Itemm failed.</div>";
        header('location:listofuplodedIMG.php');
    }
    
   }
   else{
    header('location:listofuplodedIMG.php');*/
   // $sql="DELETE FROM product_img where IG_ID =$IG_ID ";
    $sql ="DELETE FROM product_img WHERE IG_ID = $IG_ID";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      $_SESSION['delete']="<div class='success'>Delete Itemm Successfully.</div>";
      header('location:listofuplodedIMG.php');
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
   }
?>

