<?php
//mysql database connection
//const DB_NAME = "SocialPlus";
//const DB_HOST= "localhost";
//const DB_USER = "root";
//const DB_PASS= "";

//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', ''); // Replace with your database password if any
//define('DB_NAME', 'socialplus');
//session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'social_plus';


?>



