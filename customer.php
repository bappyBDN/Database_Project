<?php
  require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($_GET['C_ID'])) {
        $C_ID = $_GET['C_ID'];
        $C_Name = $_GET['C_Name'];
        $C_Email = $_GET['C_Email'];
        $C_Num = $_GET['C_Num'];
        $C_Address = $_GET['C_Address'];
        $C_Grade = $_GET['C_Grade'];
        $E_ID = $_GET['E_ID'];
        $reg_date = $_GET['reg_date'];

        $sql = "INSERT INTO customer (C_ID, C_Name, C_Email, C_Num, C_Address, C_Grade, E_ID, reg_date)
                VALUES ('$C_ID', '$C_Name', '$C_Email', '$C_Num', '$C_Address', '$C_Grade', '$E_ID', '$reg_date')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <div class="container">
        <div class="container-folid bg-light border-bottom border-success">
            <div class="row">
                <h2 class="text-success text-center p-2">Add Customer Details</h2>
            </div>
            <div class="container-folid border-top border-success">
                <form action="customer.php" method="GET">
                    <div class="row m-3">
                        <div class="col">
                            <label for="C_ID" class="form-label">Customer ID:</label>
                            <input type="number" class="form-control" placeholder="Enter Customer ID" name="C_ID">
                        </div>
                        <div class="col">
                            <label for="C_Name" class="form-label">Customer Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Customer Name" name="C_Name">
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col">
                            <label for="C_Email" class="form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="C_Email">
                        </div>
                        <div class="col">
                            <label for="C_Num" class="form-label">Contact No:</label>
                            <input type="number" class="form-control" placeholder="Enter Contact No" name="C_Num">
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col">
                            <label for="C_Address" class="form-label">Address:</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="C_Address">
                        </div>
                        <div class="col">
                            <label for="C_Grade" class="form-label">Grade:</label>
                            <input type="text" class="form-control" placeholder="Enter Grade" name="C_Grade">
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col">
                            <label for="E_ID" class="form-label">Employee ID:</label>
                            <input type="number" class="form-control" placeholder="Enter Employee ID" name="E_ID">
                        </div>
                        <div class="col">
                            <label for="reg_date" class="form-label">Registration Date:</label>
                            <input type="date" class="form-control" placeholder="Enter Registration Date" name="reg_date">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
