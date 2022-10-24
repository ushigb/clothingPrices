<?php

session_start();

$connection = mysqli_connect('localhost', 'Ivan', 'ushi', 'ushi_trims');

$username = "";
$errors = array();

if (isset($_POST['register'])) {
    register();
}

//REGISTER
function register() {

    global $connection, $errors, $username;

    $username = e($_POST['username']);

    $password1 = e($_POST['password1']);
    $password2 = e($_POST['password2']);
    $username_escape = mysqli_real_escape_string($connection, $username);
    $q = mysqli_query($connection, 'SELECT * FROM users WHERE 
            userName="' . $username_escape . '"');
    

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (mb_strlen($username) < 3) {
        array_push($errors, "The name is too short");
    }
    if (mysqli_num_rows($q) > 0) {
        array_push($errors, "There is such a user");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if (mb_strlen($password1) <= 5) {
        array_push($errors, "Password is too short");
    }    
    
    if (count($errors) == 0) {
        $password1 = md5($password2);
        
    
        $q = "INSERT INTO users (`userName`, `password`) VALUES ('$username', '$password1')";
        
        mysqli_query($connection, $q);

            $logged_in_user_id = mysqli_insert_id($connection);

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success'] = "You are now logged in";
            
            header('location: results.php');
    }
}

function getUserById($id) {
    global $connection;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

function e($val) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($val));
}

function display_error() {
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

if (isset($_POST['login-btn'])) {
    login();
}
//LOGIN
function login(){
    global $connection, $username, $errors;
    
//    $id = e($_POST['id']);
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");       
    }
    if (empty($password)) {
        array_push($errors, "Password is required");        
    }
    
    if (count($errors) == 0) {
        $password = md5($password);
    
    $q =  "SELECT * FROM users"
            . " WHERE userName = '$username' and password = '$password' ";
    $results = mysqli_query($connection, $q);
    
    if (mysqli_num_rows($results) == 1) {
        if ($logged_in_user['user_type'] == 'admin') {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location:index.php');
            } else {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";

                header('location:results.php');
            }
    }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

