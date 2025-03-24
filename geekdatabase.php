<?php
$host = "localhost";
$dbname = "geek_db";
$username = "root";
$password = "";

$connection = mysqli_connect($host, $username, $password, $dbname);


//check connection ig connected
if(!$connection){
    die("Connection Failed: ". mysqli_connnect_error());
}else{
    echo "";
}


?>