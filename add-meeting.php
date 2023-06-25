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
            <h2>Add New Meetings</h2>
            <form action="save-meeting.php" method="post">
                <div class="form-control">
                    <label for="meeting-name">Meeting's Name</label>
                    <input type="text" name="meetingName" id="meeting-name">
                </div>
                <div class="form-control">
                    <label for="meeting-code">Meeting's Code</label>
                    <input type="text" name="meetingCode" id="meeting-code">
                </div>
                <div class="form-control">
                    <label for="meeting-date">Meeting's Date</label>
                    <input type="date" name="meetingDate" id="meeting-date">
                </div>
                <div class="form-control">
                    <label for="meeting-time">Meeting's Time</label>
                    <input type="time" name="meetingTime" id="meeting-time">
                </div>
                <div class="form-control">
                    <label for="meeting-venue">Meeting's Venue</label>
                    <input type="text" name="meetingVenue" id="meeting-venue">
                </div>
                <div class="add-event">
                    <button type="submit" class="btn-edit">Add Meeting</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>