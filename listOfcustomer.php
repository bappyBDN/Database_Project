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

      $sql ="select * from customer ";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        echo "<table border='4'>
        <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>Customer Number</th>
        <th>Customer Address</th>
        <th>Customer Grade</th>
        <th>Employee ID</th>
        <th>Reg date</th>
        <th>Action</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
      
          

          $C_ID =$row['C_ID'];
          $C_Name = $row['C_Name'];
          $C_Email = $row['C_Email'];
          $C_Num = $row['C_Num'];
          $C_Address = $row['C_Address'];
          $C_Grade =$row['C_Grade'];
          $E_ID = $row['E_ID'];
          $reg_date = $row['reg_date'];
          
      
          echo "<tr>
          <td>$C_ID</td>
          <td>$C_Name</td>
          <td>$C_Email</td>
          <td>$C_Num</td>
          <td>$C_Address</td>
          <td>$C_Grade</td>
          <td>$E_ID</td>
          <td>$reg_date</td>
      
      
      
          <td>
          <a href='#'>EDIT</a></td>
          </tr>";
      
         
        }
        echo "</table>";
      }