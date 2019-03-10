<?php
require_once 'connection.php';

$data=$_POST;
$email= isset($data['mail']) ? $data['mail'] : null;
$password= isset($data['pass']) ? $data['pass'] : null;

$sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
$result=$conn->query($sql);
$data=mysqli_num_rows($result);
$row = $result->fetch_assoc();

if($data=='1'){
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['username']=$row['username'];
    $_SESSION['bio']=$row['bio'];
    $_SESSION['filename']=$row['filename'];
    header("location:profile.php");

}else{

}

?>