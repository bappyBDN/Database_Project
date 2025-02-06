<?php
  require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Employees</title>
</head>
<body>

<?php

$sql = "SELECT * FROM employee ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='4'>
    <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Employee Rank</th>
    <th>Employee Number</th>
    <th>Employee City</th>
    <th>Employee Salary</th>
    <th>Action</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
      
        $E_ID = $row['E_ID'];
        $E_Name = $row['E_Name'];
        $E_Rank = $row['E_Rank'];
        $E_Num = $row['E_Num'];
        $E_City = $row['E_City'];
        $E_Salary = $row['E_Salary'];
        
        echo "<tr>
        <td>$E_ID</td>
        <td>$E_Name</td>
        <td>$E_Rank</td>
        <td>$E_Num</td>
        <td>$E_City</td>
        <td>$E_Salary</td>
        <td><a href='#'>EDIT</a></td>
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
