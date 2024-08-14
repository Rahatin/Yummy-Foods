<?php



session_start();
include "../database/env.php";

//echo"<par>";
//print_r($_FILES);
//echo"<par>";
//exit();

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$isValidEmail = filter_var($email,FILTER_VALIDATE_EMAIL);

$errors= [];


//Userrname//

if(empty($name)){
    $errors['name_error'] = 'User Name is missing!';
}

//Email//

if(empty($email)){
    $errors['email_error'] = 'Email is missing!';
}else if(!$isValidEmail){
    $errors['email_error'] = 'Invalid Email!';
} else{
    $id = $_SESSION['auth']['id'];
    $query = "SELECT email FROM `users` WHERE email = '$email' AND id != '$id'";
    $res = mysqli_query($conn, $query);
    
    if($res->num_rows > 0){
        $errors['email_error'] = 'Email already exists!';
    }

    
}
if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header("Location: ../dashboard/Profile.php");



}