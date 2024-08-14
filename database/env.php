<?php


$DatabaseHost = 'localhost';
$DatabaseUser = 'root';
$DatabasePassword = '';
$DatabaseName = 'yummy_food';



$conn  = mysqli_connect($DatabaseHost,$DatabaseUser ,$DatabasePassword,$DatabaseName);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// databse//......