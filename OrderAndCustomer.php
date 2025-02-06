<?php
require('connection.php');
?>

<!DOCTYPE html>

<html>
<head>
    <title>ADD COMPANY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="container-fluid bg-light border-bottom border-success">
        <div class="row">
            <h2 class="text-success text-center p-2">List of Company</h2>
        </div>

        <div class="container-fluid border-top border-success">
            <table class="table">
                <tr>
                    <th>Order_ID</th>
                    <th>Customer Name</th>
                    <th>Entry Date</th>
                </tr>

                <?php
                // Use LEFT JOIN and UNION to simulate FULL OUTER JOIN
                $sql = "
                SELECT customer.C_Name, o_idnew_ordertb.O_ID, o_idnew_ordertb.O_Date
                FROM customer
                LEFT JOIN o_idnew_ordertb ON customer.C_Name = o_idnew_ordertb.Cus_Name
                UNION
                SELECT customer.C_Name, o_idnew_ordertb.O_ID, o_idnew_ordertb.O_Date
                FROM o_idnew_ordertb
                LEFT JOIN customer ON customer.C_Name = o_idnew_ordertb.Cus_Name
                ORDER BY C_Name";
                
                $res = mysqli_query($conn, $sql);
                
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $O_ID = $row["O_ID"];
                            $C_Name = $row["C_Name"];
                            $Entry_Date = $row["O_Date"];
                            ?>
                            <tr>
                                <td><?php echo $O_ID ?></td>
                                <td><?php echo $C_Name ?></td>
                                <td><?php echo $Entry_Date ?></td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>
