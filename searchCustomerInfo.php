<?php
require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container"><!--start Container-->
    <div class="container-fluid bg-light border-bottom border-success"><!--topbar-->
        <div class="row">
            <h2 class="text-success text-center p-2">Customer Details</h2>
        </div>

        <div class="container-fluid border-top border-success">
            <form action="searchCustomerInfo.php" method="GET">
                <div class="row m-3">
                    <div class="col">
                        <label for="C_ID" class="form-label">Customer ID:</label>
                        <input type="number" class="form-control" placeholder="Enter Customer ID" name="C_ID" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            <?php
            if (isset($_GET['C_ID'])) {
                $C_ID = $_GET['C_ID'];

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT C_Name, C_Address, reg_date FROM customer WHERE C_ID = ?");
                $stmt->bind_param("i", $C_ID);

                if ($stmt->execute()) {
                    $stmt->bind_result($C_Name, $C_Address, $reg_date);
                    if ($stmt->fetch()) {
                        echo "<div class='alert alert-success text-center'>";
                        echo "<p><strong>Name:</strong> " . htmlspecialchars($C_Name) . "</p>";
                        echo "<p><strong>Address:</strong> " . htmlspecialchars($C_Address) . "</p>";
                        echo "<p><strong>Registration Date:</strong> " . htmlspecialchars($reg_date) . "</p>";
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>Customer not found</div>";
                    }
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>