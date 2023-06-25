<?php
    require_once 'connect.php';
    $email = $_POST['email'];
    $to = $email;

    $sql = "SELECT membersID FROM members WHERE membersEmail = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $membersID = $row['membersID'];
    
    header('location: reset-password.php?membersID='.$membersID);
?>