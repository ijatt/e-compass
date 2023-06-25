<?php
    session_start();
    require_once 'connect.php';

    $membersID = $_SESSION['membersID'];
    $message = $_POST['message'];

    $sql = "INSERT INTO message_log (messageContent, sentDate, sentTime, membersID) VALUES ('$message', CURRENT_DATE(), CURRENT_TIME(), '$membersID')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: message.php');
        exit;
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>