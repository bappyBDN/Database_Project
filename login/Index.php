
<?php
require_once'assets/php/Function.php';
if(isset($_SESSION['Auth'])){
    echo "user is logged in";
    $userdata = $_SESSION['userdata'];
    echo "<pre>";
    print_r($userdata);
}

    
elseif(isset($_GET['signup'])){

    showPage('header' , ['page_tittle'=>'Social Plus - SignUp']);
    showPage('signup');
   
}
elseif(isset($_GET['login'])){
    showPage('header' , ['page_tittle'=>'Social Plus - Login']);
    showPage('login');
}else{
    showPage('header' , ['page_tittle'=>'Social Plus - Login']);
    showPage('login');
}
showPage('Footer'); 
unset($_SESSION['error']);
unset($_SESSION['formdata']);


