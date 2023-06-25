<?php
    require_once 'connect.php';

    $membersID = $_GET['membersID'];
    $newPassword = $_POST['password'];

    $sql = "UPDATE members SET password = '$newPassword' WHERE membersID = '$membersID'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>