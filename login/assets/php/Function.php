<?php
session_start();
require_once 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// Function for showing page
function showPage($page, $data = "") {
    include("assets/pages/$page.php");
}

// Function for showing error
function showError($field) {
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        if (isset($error['field']) && $field == $error['field']) {
            ?>
            <div class="alert alert-danger my-2" role="alert">
                <?php echo $error['msg']; ?>
            </div>
            <?php
        }
    }
}

// Function for showing previous form data
function showFormData($field) {
    if (isset($_SESSION['formdata'])) {
        $form_data = $_SESSION['formdata'];
        return isset($form_data[$field]) ? $form_data[$field] : null;
    }
    return null; // Return null if 'formdata' is not set in the session
}

// Function for checking duplicate email
function isEmailRegistered($email) {
    global $conn;

    $query = "SELECT count(*) FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        return $row[0] > 0;
    } else {
        return false;
    }
}

// Function for checking duplicate username
function isUsernameRegistered($user_name) {
    global $conn;

    $query = "SELECT count(*) FROM users WHERE user_name='$user_name'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        return $row[0] > 0;
    } else {
        return false;
    }
}

// Function for validating the sign up form
function validateSignupForm($form_data) {
    $response = array();
    $response['status'] = true;

    if (empty($form_data['password'])) {
        $response['msg'] = "Password is not given";
        $response['status'] = false;
        $response['field'] = 'password';
    }

    if (empty($form_data['username'])) {
        $response['msg'] = "Username is not given";
        $response['status'] = false;
        $response['field'] = 'username';
    }

    if (empty($form_data['email'])) {
        $response['msg'] = "Email is not given";
        $response['status'] = false;
        $response['field'] = 'email';
    }

    if (empty($form_data['last_name'])) {
        $response['msg'] = "Last name is not given";
        $response['status'] = false;
        $response['field'] = 'last_name';
    }

    if (empty($form_data['first_name'])) {
        $response['msg'] = "First name is not given";
        $response['status'] = false;
        $response['field'] = 'first_name';
    }

    if (isEmailRegistered($form_data['email'])) {
        $response['msg'] = "Email Id is already registered";
        $response['status'] = false;
        $response['field'] = 'email';
    }

    if (isUsernameRegistered($form_data['username'])) {
        $response['msg'] = "Username is already registered";
        $response['status'] = false;
        $response['field'] = 'username';
    }

    return $response;
}

// Function for validating the login form
function validateLoginForm($form_data) {
    $response = array();
    $response['status'] = true;
    $blank=false;
    if (empty($form_data['password'])) {
        $response['msg'] = "Password is not given";
        $response['status'] = false;
        $response['field'] = 'password';
        $blank=true;
    }

    if (empty($form_data['username_email'])) {
        $response['msg'] = "Username/email is not given";
        $response['status'] = false;
        $response['field'] = 'username_email';
        $blank=true;
    }

    $user = checkUser($form_data);
    if (!$blank &&!$user['status']) {
        $response['msg'] = "Incorrect username/email or password";
        $response['status'] = false;
        $response['field'] = 'checkuser';
    } else {
        $response['user'] = $user['user'];
    }

    return $response;
}

// Function for checking the user
function checkUser($login_data) {
    global $conn;

    $username_email = $login_data['username_email'];
    $password = md5($login_data['password']);

    $query = "SELECT * FROM users WHERE (email='$username_email' OR user_name='$username_email') AND password='$password'";
    $run = mysqli_query($conn, $query);
    $data['user'] = mysqli_fetch_assoc($run) ?? array();

    if (count($data['user']) > 0) {
        $data['status'] = true;
    } else {
        $data['status'] = false;
    }

    return $data;
}

// Function for creating new user
function createUser($data) {
    global $conn;

    $first_name = mysqli_real_escape_string($conn, $data['first_name']);
    $last_name = mysqli_real_escape_string($conn, $data['last_name']);
    $gender = $data['gender'];
    $email = mysqli_real_escape_string($conn, $data['email']);
    $user_name = mysqli_real_escape_string($conn, $data['username']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password = md5($password);

    $query = "INSERT INTO users (first_name, last_name, gender, email, user_name, password) VALUES ('$first_name', '$last_name', '$gender', '$email', '$user_name', '$password')";

    return mysqli_query($conn, $query);
}
?>
