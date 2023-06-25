<?php
    session_start();
    require_once 'connect.php';
    $membersID = $_SESSION['membersID'];
    $meetingID = $_GET['meetingID'];

    try{
        $sql = "INSERT INTO attendance (membersID, meetingID, date, time) VALUES ('$membersID', '$meetingID', CURRENT_DATE(), CURRENT_TIME())";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: meetings.php?attendance=true');
            exit;
        }
        else{
            header('Location: meetings.php?attendance=false');
            exit;
        }
    } catch (mysqli_sql_exception $e){
        header('Location: meetings.php?attendance=false');
        exit;
    }
?>