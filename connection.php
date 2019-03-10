<?php
$host='localhost';
$username='root';
$password='';
$db_name='blogger';

$conn= new mysqli($host,$username,$password,$db_name);
if($conn->connect_error){
    die('Connection Error'.$conn->connect_error);
}
?>