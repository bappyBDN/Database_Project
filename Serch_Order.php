<?php
      require('connection.php');
?>

<?php
// Assuming you have a form that submits 'customer_id'


    // Sanitize the input to prevent SQL injection
    $C_ID = $conn->real_escape_string($C_ID);

    // Prepare the query
    $sql = "
        SELECT * FROM o_idnew_ordertb
        WHERE Cus_ID IN (
            SELECT C_ID 
            FROM customer 
            WHERE C_ID = '$C_ID'
        )
    ";

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Order ID: " . $row["order_id"]. " - Customer ID: " . $row["C_ID"]. " - Order Details: " . $row["order_details"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();

?>

<!-- HTML Form -->
<form method="post" action="">
    Customer ID: <input type="text" name="C_ID">
    <input type="submit" value="Search Orders">
</form>