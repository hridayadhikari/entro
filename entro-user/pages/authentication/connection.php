<?php

$server = "localhost";
$user = 'root';
$password = '' ;
$db_name = 'entro';

$con = new mysqli ($server,$user,$password,$db_name);

if(!$con){
  die(mysqli_error($con));
}

?>