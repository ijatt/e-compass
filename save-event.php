<?php
    require_once 'connect.php';
    $file = $_FILES['eventImg'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $destination = 'images/' . $fileName;

    move_uploaded_file($fileTmpName, $destination);

    $eventName = $_POST['event-name'];
    $eventDate = $_POST['event-date'];
    $eventVenue = $_POST['event-venue'];
    $eventDesc = $_POST['event-desc'];

    $sql = "INSERT INTO events (eventName, eventDate, eventVenue, eventDesc, eventImg) VALUES ('$eventName', '$eventDate', '$eventVenue', '$eventDesc', '$destination')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: event.php');
        exit;
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>