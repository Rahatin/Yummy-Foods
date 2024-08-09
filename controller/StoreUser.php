<?php
session_start();
include "../database/env.php";

$userName = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$confirm_password = $_REQUEST['confirm_password'];
$terms = $_REQUEST['terms'] ?? false;
$encPassword = password_hash($password, PASSWORD_BCRYPT);
$isValidEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
$errors= [];


//Userrname//

if(empty($userName)){
    $errors['name_error'] = 'User Name is missing!';
}



//Email//

if(empty($email)){
    $errors['email_error'] = 'Email is missing!';
}else if(!$isValidEmail){
    $errors['email_error'] = 'Invalid Email!';
} else{
    $query = "SELECT email FROM `users` WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    
    if($res->num_rows > 0){
        $errors['email_error'] = 'Email already exists!';
    }

    
}


//PASSWORD//

if(empty($password)){
    $errors['password_error'] = 'Password is missing!';
} else if (strlen($password) < 8){
    $errors['password_error'] = 'Password should be greater or equal to 8 char!';
} else if($password !== $confirm_password){
    $errors['password_error'] = 'Password and Confirm Password do not match!';
}



//TERMS //
if(!$terms){
    $errors['terms_error'] = 'Please accept our terms and policy';
}


//errore//

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header("Location: ../signup.php");



} else {
    $query = "INSERT INTO users(name, email, password) VALUES ('$userName','$email','$encPassword')";
    $res = mysqli_query($conn,$query);

    if($res){
        $_SESSION['success'] = "Sign up Successfully";
        header("Location: ../signin.php");
    }


}