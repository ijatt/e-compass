<?php
    require_once 'connect.php';
    $meetingCode = $_POST['meeting-code'];
    $sql = "SELECT * FROM meetings WHERE meetingCode = '$meetingCode'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    if($result == 1){
        header('Location: meetings.php?meetingFound=true&meetingID='. $data['meetingID']);
        exit;
    }
    else{
        header('Location: meetings.php?meetingFound=false');
    }
?>