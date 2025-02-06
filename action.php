<?php
require_once 'Function.php';
//for managing signup
if(isset($_GET['signup'])) {
 $response=validateSignupForm($_POST);
if ($response['status']){
   //echo isEmailRegistered('azizulhakimshouvo@gmail.com');
/* $email = 'azizulhakimshuvo185@gmail.com'; // The email to be checked
if (isEmailRegistered($email)) {
    echo "Email is registered.";
} else {
    echo "Email is not registered.";

*/
    if(createUser($_POST)){
        header('location:../../?login');
    }
    else{
        echo "<script>alert('something is worng')</script>";
    }

}
else{
    $_SESSION['error']=$response;
    $_SESSION['formdata']=$_POST;
     header("location:../../?signup");
}
}


//for managing login
if(isset($_GET['login'])) {
   $response=validateLoginForm($_POST);
   if ($response['status']){
      //echo isEmailRegistered('azizulhakimshouvo@gmail.com');
   /* $email = 'azizulhakimshuvo185@gmail.com'; // The email to be checked
   if (isEmailRegistered($email)) {
       echo "Email is registered.";
   } else {
       echo "Email is not registered.";
   
   */
       $_SESSION['Auth']=true;
       $_SESSION['userdata']=$response['user'];
       header("location:../../");
   
   }
   else{
       $_SESSION['error']=$response;
       $_SESSION['formdata']=$_POST;
        header("location:../../?login");
   }
   }
   

