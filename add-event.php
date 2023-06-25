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
            <li class="nav-item active"><a class="active" href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item"><a href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item"><a href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item"><a href="merch.php"><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a></li>
        </ul>
    </div>
    <main>
        <div class="card add-card">
            <h1>Add New Event</h1>
            <form action="save-event.php" method="post" enctype="multipart/form-data">
                <div class="img-section">
                    <img id="add-image" src="images/add-image.png" alt="">
                    <input type="file" id="file-input" hidden name="eventImg">
                    <button class="btn-edit" id="add-image-btn" type="button">Add Image</button>
                </div>
                <div class="form-control">
                    <label for="event-name">Event Name</label>
                    <input type="text" name="event-name">
                </div>
                <div class="form-control">
                    <label for="event-date">Event Date</label>
                    <input type="date" name="event-date">
                </div>
                <div class="form-control">
                    <label for="event-venue">Event Venue</label>
                    <input type="text" name="event-venue">
                </div>
                <div class="form-control">
                    <label for="event-desc">Event Description</label>
                    <textarea name="event-desc" rows="5"></textarea>
                </div>
                <div class="add-event">
                    <a href="event.php" class="btn-edit  btn-cancel">Cancel</a>
                    <button type="submit" name="add-event" class="btn-edit">Add Event</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        const button = document.querySelector('#add-image-btn');
        const fileInput = document.querySelector('#file-input');
        const addImage = document.querySelector('#add-image');
        button.onclick = () => {
            fileInput.click();
        }

        fileInput.onchange = () => {
            addImage.src = URL.createObjectURL(fileInput.files[0]);
            const name = addImage.getAttribute('src');
        }
    </script>
</body>
</html>