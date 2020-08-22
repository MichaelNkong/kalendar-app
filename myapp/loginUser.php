<?php

require_once("dbcontroller/dbconnect.php");
$username1 = $_POST['inputusername'];
$password2 = md5($_POST['inputpasswort']);
$database = new Databaseconnect();
if(isset($_POST["login"])){

loginUser();

}


function loginUser(){
$username1 = $_POST['inputusername'];
$password2 = md5($_POST['inputpasswort']);
$database = new Databaseconnect();
$conn = $database->get_connect();
$sql = "select * from user where username = '$username1' AND passwort = '$password2'";
$user = mysqli_query($conn, $sql);
if(mysqli_num_rows($user) ==1){
    $_SESSION['username'] = $username;
    header("Location:dashboard.php");
}
else 
{

  echo "
    
   <div class='form' style ='background-color:red; width:100% ; display:inline-block; '>      
        <h2 style='margin-left:10px; font-size: 40px; font-weight:10px'>   username/password incorrect </h2>
        <a href='signinform.html' id='signin'>sign in</a>
         </div>
         
    ";
}


}