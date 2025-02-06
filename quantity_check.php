<?php
require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Information Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container"><!--start Container-->
    <div class="container-fluid bg-light border-bottom border-success"><!--topbar-->
        <div class="row">
            <h2 class="text-success text-center p-2">Product Information Check</h2>
        </div>

        <div class="container-fluid border-top border-success">
            <form action="quantity_check.php" method="GET">
                <div class="row m-3">
                    <div class="col">
                        <label for="P_ID" class="form-label">Product ID:</label>
                        <input type="number" class="form-control" placeholder="Enter Product ID" name="P_ID" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            <?php
            if (isset($_GET['P_ID'])) {
                $P_ID = $_GET['P_ID'];

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT price, Qtt, EX_Date FROM product WHERE P_ID = ?");
                $stmt->bind_param("i", $P_ID);

                if ($stmt->execute()) {
                    $stmt->bind_result($price, $quantity, $expiry_date);
                    if ($stmt->fetch()) {
                        echo "<div class='alert alert-success text-center'>".
                             "Price: $" . htmlspecialchars($price) . "<br>" .
                             "Quantity: " . htmlspecialchars($quantity) . "<br>" .
                             "Expiry Date: " . htmlspecialchars($expiry_date) .
                             "</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>Product not found</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger text-center'>Error executing query: " . htmlspecialchars($stmt->error) . "</div>";
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
