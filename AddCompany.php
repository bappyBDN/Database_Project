<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD COMPANY </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

      <?php
      
      if(isset($_GET['Company_Name'])){

         $Company_ID    =$_GET['Company_ID'];
         $Company_Name  =$_GET['Company_Name'];
         $Entry_Date    =$_GET['Entry_Date'];


        $sql = "insert into company (Company_ID,Company_Name,Entry_Date)
            values(' $Company_ID','$Company_Name','$Entry_Date')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } //else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
             // }
              
              //$conn->close();


      }
      

       ?>

          <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Add Companys Details</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <form action="AddCompany.php" method="GET">
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Company ID:</label>
                            <input type="number" class="form-control" id="e" placeholder="Enter ID" name="Company_ID">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Company Name:</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Name" name="Company_Name">

                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Entry Date:</label>
                            <input type="date" class="form-control" id="" placeholder="Entry date" name="Entry_Date">
                            
                          </div>
                        
                          <button type="submit" value="submit" class="btn btn-primary ">Submit</button>
                        </form>
             
                      </div>

      
             </div>



     </body>

  </html>


