


<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'supershop_db';

// Create connection
 $conn = new mysqli($servername, $username, $password, $database);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


   $sql="CREATE TABLE Customer (
    C_ID int NOT NULL  AUTO_INCREMENT,
    C_Name varchar(25) NOT NULL,
    C_Email varchar(45) NOT NULL,
    C_Num int NOT NULL,
    C_Address varchar(25),
    C_Grade varchar(10) ,
     E_ID int,
    PRIMARY KEY (C_ID),
    FOREIGN KEY (E_ID) REFERENCES employee(E_ID),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  //echo "Error creating table: " . $conn->error;
}

//$conn->close();



 

?>