<?php
  require('connection.php');
?>

<!DOCTYPE html>
<html>a
<head>
    <title>ADD COMPANY </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container"><!--start Container-->
    <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
        <div class="row">
            <h2 class="text-success text-center p-2">List of Company</h2>
        </div>

        <div class="container-folid border-top border-success">
            <table class="table">
                <tr>
                    <th>Store Pro_Name</th>
                    <th>Store PProduct Qtt</th>
                    <th>SpandPto_Name</th>
                    <th>SpandPro_Qty</th>
                </tr>

                <?php
                $sql = "SELECT store_product.store_product_name, store_product.store_product_quentity, spend_product.spend_product_name, spend_product.spend_product_quentity
                        FROM store_product
                        LEFT JOIN spend_product ON store_product.store_product_id = spend_product.store_product_id
                        UNION ALL
                        SELECT store_product.store_product_name, store_product.store_product_quentity, spend_product.spend_product_name, spend_product.spend_product_quentity
                        FROM spend_product
                        LEFT JOIN store_product ON spend_product.store_product_id = store_product.store_product_id";

                $res = mysqli_query($conn, $sql);

                if (!$res) {
                    die('Query Error: ' . mysqli_error($conn));
                }

                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $SP_Name = $row["store_product_name"];
                        $SP_Qtt = $row["store_product_quentity"];
                        $SD_Name = $row["spend_product_name"];
                        $SD_Qtt = $row["spend_product_quentity"];
                        ?>

                        <tr>
                            <td><?php echo $SP_Name; ?></td>
                            <td><?php echo $SP_Qtt; ?></td>
                            <td><?php echo $SD_Name; ?></td>
                            <td><?php echo $SD_Qtt; ?></td>
                        </tr>

                        <?php
                    }
                }
                ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>
