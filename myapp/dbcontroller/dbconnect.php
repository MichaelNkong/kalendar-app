<?php
class Databaseconnect{

 private  $servername ="127.0.0.1";
 private $username  = "root";
 private $password ="HoMoZea4722%?";
 private $dbname =  "ka";
 private $con;

public function __construct(){
    
$this->con =  mysqli_connect($this->servername,$this->username,$this->password,$this->dbname) ;
}
public function get_connect(){

    return $this->con;
   }
public function execute_query($sql){

$sc = mysqli_query($this->get_connect(),$sql);
return $sc;
}
function get_rows($fields, $id = NULL, $tablename = NULL)  {  
        $cn = !emptyempty($id) ? " WHERE $id " : " ";  
        $fields = !emptyempty($fields) ? $fields : " * ";  
        $sql = "SELECT $fields FROM $tablename $cn";  
        $results = $this ->execute_query($sql);  
        $rows = $this -> get_fetch_data($results);  
        return $rows;  
    }  
public function  get_fetch_data($sr){

    $array = array();  
    while ($rows = mysql_fetch_assoc($sr))  
    {  
        $array[] = $rows;  
    }  
    return $array; 

}

public function registerUser($uname,$upassword){
$sql1 ="select * from user where username =$uname";
$userxist = $this->execute_query($sql1);
if(empty($userxist)){
$sql2 = "insert into user(username,passwort) values('$uname','$upassword')";
$userNotExist = $this->execute_query($sql2);
if($userNotExist){
echo "registration";

}
else{

    echo "registration unsuccesful";
}

}

else
{

    echo  "user name already used";
}


}

}