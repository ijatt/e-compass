<?php
session_start();
require_once 'connect.php';

$membersID = $_POST['student-id'];
$password = $_POST['password'];

$sql = "SELECT * FROM members WHERE membersID = '$membersID' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1){
    $_SESSION['logged-in'] = true;
    $_SESSION['membersID'] = $membersID;
    header('Location: profile.php');
}
else{
    header('Location: index.php?login=false');
}
?>