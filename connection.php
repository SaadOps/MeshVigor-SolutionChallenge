<?php
$username ="root";
$password="";
$server='localhost';
$db ='donation_project';

$con = mysqli_connect($server,$username,$password,$db);

if($con){
}
else{
    echo "No connection";
    
}


?>