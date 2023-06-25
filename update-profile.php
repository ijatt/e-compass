<?php
require_once 'connect.php';
$membersID = $_GET['membersID'];
$membersName = $_POST['membersName'];
$membersPosition = $_POST['position'];
$membersPart = $_POST['part'];
$membersPhone = $_POST['phone'];
$membersEmail = $_POST['email'];
$membersLinkedin = $_POST['linkedin'];

$sql = "UPDATE members set membersName = '$membersName', membersPosition = '$membersPosition', membersPart = '$membersPart', membersPhone = '$membersPhone', membersEmail = '$membersEmail', membersLinkedin = '$membersLinkedin' WHERE membersID = '$membersID'";
$result = mysqli_query($conn, $sql);
if($result){
    header('location: profile.php');
}
else{
    echo 'Error updating profile';
}
?>