<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>List of Product </title>
        

    </head>
    <body>

      <?php

      $sql ="select * from product ";

      $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='4'>
  <tr>
  <th>Product ID</th>
  <th>Product Name</th>
  <th>Product Catagory</th>
  <th>Company Name</th>
  <th>Company ID</th>
  <th>Product Price</th>
  <th>Action</th>
  </tr>";
  while($row = $result->fetch_assoc()) {

    $P_ID  = $row["P_ID"];
    $P_Name = $row["P_Name"];
    $P_Catagory = $row["P_Catagory"];
    $C_ID = $row["C_ID"];
    $C_Name = $row["C_Name"];
    $Price = $row["Price"];
    

    echo "<tr>
    <td>$P_ID</td>
    <td>$P_Name</td>
    <td>$P_Catagory</td>
    <td>$C_ID</td>
    <td>$C_Name</td>
    <td>$Price</td>



    <td>
    <a href='#'>EDIT</a></td>
    </tr>";

   
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
      

       ?>

      
     </body>

  </html>