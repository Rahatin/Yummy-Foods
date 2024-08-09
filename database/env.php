<?php


$DatabaseHost = 'localhost';
$DatabaseUser = 'root';
$DatabasePassword = '';
$DatabaseName = 'yammy';


$conn  = mysqli_connect($DatabaseHost,$DatabaseUser ,$DatabasePassword,$DatabaseName);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// databse//......