<?php
    require_once 'connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-COMPASS</title>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="side-bar">
        <h2>e-COMPASS</h2>
        <ul class="nav-items">
            <li class="nav-item"><a href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
            <li class="nav-item"><a href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item active"><a class="active" href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item"><a href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item"><a href="merch.php"><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a></li>
        </ul>
    </div>
    <main>
        <div class="card">
            <div class="column">
                <h2>Enter the meeting's code</h2>
                <form action="search-meeting.php" method="post">
                    <div class="form-control meeting-form">
                        <input type="text" name="meeting-code">
                    </div>
                    <div class="form-button">
                        <input type="submit" name="submit" value="Send" class="btn-edit">
                    </div>
                </form>
            </div>
            <?php
                if(isset($_GET['meetingID'])){
                    $meetingID = $_GET['meetingID'];
                    $sql = "SELECT * FROM meetings WHERE meetingID = '$meetingID'";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    if($data > 0){      
            ?>
            <div class="meeting-box">
                <h2><?php echo $data['meetingName'];?></h2>
                <p><?php echo date('d F, g.i A', strtotime($data['meetingDate'] . ' ' . $data['meetingTime'])); ?></p>
                <p><?php echo $data['meetingVenue'] ?></p>
                <div class="form-button">
                    <a href="present.php?meetingID=<?php echo $data['meetingID']?>" class="btn-edit">Present</a>
                </div>
            </div>
            <?php
                    } else {
            ?>
            <div class="meeting-box">
                <h2>Meeting Not Found</h2>
                <a href="meetings.php" class="btn-edit">Resend</a>
            </div>
            <?php 
                    }
                } 
            ?>
            <div class="pop-message">
                <div class="top-panel">
                    <h3>Message</h3>
                    <span class="close"><i class="fa-solid fa-xmark"></i></span>
                </div>
                <div class="body-panel">
                    <p class="message">Attendance Recorded</p>
                </div>
            </div>
            <?php 
                $membersID = $_SESSION['membersID'];
                $sql = "SELECT membersPosition FROM members WHERE membersID = '$membersID'";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                if($data['membersPosition'] == 'President'){
            ?>
            <div class="add-event">
                <a href="add-meeting.php" class="btn-edit">Add Meeting</a>
            </div>
            <?php
                }
            ?>
        </div>
    </main>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const meetingFound = urlParams.get('meetingFound');
        const meetingBox = document.querySelector('.meeting-box');
        const column = document.querySelector('.column');
        const popMessage = document.querySelector('.pop-message');
        const close = document.querySelector('.close').onclick = () => {
            popMessage.style.display = 'none';
        };

        if(meetingFound){
            meetingBox.style.display = 'block';
            column.style.display = 'none';
        }

        if(urlParams.has('attendance')){
            const attendance = urlParams.get('attendance');
            
            if(attendance == 'true'){
                popMessage.style.display = 'block';
            }
            else{
                popMessage.style.display = 'block';
                const message = document.querySelector('.message');
                message.innerHTML = "Attendance failed to be recorded. <br> You may have already signed for the attendance.";
                message.style.textAlign = 'center';
            }
        }

        if(urlParams.has('add-meeting')){
            const addMeeting = urlParams.get('add-meeting');
            if(addMeeting == 'true'){
                popMessage.style.display = 'block';
                const message = document.querySelector('.message');
                message.innerHTML = "Meeting successfully added.";
            }
            else{
                popMessage.style.display = 'block';
                const message = document.querySelector('.message');
                message.innerHTML = "Meeting failed to be added.";
            }
        }

        
    </script>
</body>
</html>