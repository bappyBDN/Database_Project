<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD Product </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

      <?php
      
      if(isset($_GET['E_ID'])){

         $E_ID=$_GET['E_ID'];
         $E_Name=$_GET['E_Name'];
         $E_Rank=$_GET['E_Rank'];
         $E_Num= $_GET['E_Num'];
         $E_City= $_GET['E_City'];
         $E_Salary= $_GET['E_Salary'];



        $sql = "insert into employee (E_ID,E_Name,E_Rank,E_Num,E_City,E_Salary)
            values('$E_ID','$E_Name','$E_Rank','$E_Num','$E_City','$E_Salary')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
              
              $conn->close();


      }
      

       ?>

<div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Add Products Details</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <form action="AddEmployee.php" method="GET">
                        <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Employee ID:</label>
                        <input type="number" class="form-control" placeholder="Enter Employee ID" name="E_ID">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Emlpoyee Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Employee Name" name="E_Name">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Rank:</label>
                        <input type="text" class="form-control" placeholder="Enter Rank" name="E_Rank">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">City Name:</label>
                        <input type="text" class="form-control" placeholder="Enter City" name="E_City">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                 <div class="col">
                 <label for="" class="form-label">Contuct No:</label>
                        <input type="number" class="form-control" placeholder="Enter phonr no" name="E_Num">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Monthly Salary:</label>
                        <input type="text" class="form-control" placeholder="Salary" name="E_Salary">
                        </div>
                 </div>
                <div class="d-flex justify-content-center my-4">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                        </form>
             
                      </div>

      
             </div>













       

     </body>

  </html>