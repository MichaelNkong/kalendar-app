<?php
include_once("dbcontroller/dbconnect.php");


if(isset($_POST['submit'])){
$database = new Databaseconnect();
$conn = $database->get_connect();
$hname=$_POST["inputusername"];
$userpassword = md5($_POST["inputpasswort"]);




$database->registerUser($hname,$userpassword);



}