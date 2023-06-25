<?php
    require_once 'connect.php';

    $meetingCode = $_POST['meetingCode'];
    $meetingName = $_POST['meetingName'];
    $meetingDate = $_POST['meetingDate'];
    $meetingTime = $_POST['meetingTime'];
    $meetingVenue = $_POST['meetingVenue'];

    $sql = "INSERT INTO meetings (meetingCode, meetingName, meetingDate, meetingTime, meetingVenue) VALUES ('$meetingCode', '$meetingName', '$meetingDate', '$meetingTime', '$meetingVenue')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: meetings.php?add-meeting=true");
        exit;
    }
    else{
        header("Location: meetings.php?add-meeting=false");
        exit;
    }

?>