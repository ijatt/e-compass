<?php
    require_once 'connect.php';
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
            <li class="nav-item active"><a class="active" href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item"><a href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item"><a href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item"><a href="merch.php"><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a></li>
        </ul>
    </div>
    <main>
        <div class="card">
            <div class="section">
                <h2>Upcoming Events</h2>
                <?php
                    $upcomingQuery = "SELECT * FROM events WHERE eventDate > CURDATE()";
                    $upcomingResult = mysqli_query($conn, $upcomingQuery);
                    while($row = mysqli_fetch_assoc($upcomingResult)){
                ?>
                <div class="event-box" id="event-box">
                    <img id="event-image" src="<?php echo $row['eventImg'] ?>" alt="event image">
                    <div class="event-details">
                        <h3><?php echo $row['eventName']?></h3>
                        <div class="row">
                            <div class="column-details">
                                <p class="bold">Date</p>
                                <p><?php echo $row['eventDate'] ?></p>
                            </div>
                            <div class="column-details">
                                <p class="bold">Venue</p>
                                <p><?php echo $row['eventVenue'] ?></p>
                            </div>
                        </div>
                        <div class="event-desc" id="event-desc">
                            <p><?php echo $row['eventDesc'] ?></p>
                        </div>
                        <div class="column-button">
                            <button class="btn-view">VIEW</button>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    if(mysqli_num_rows($upcomingResult) == 0){ 
                ?>
                <p>No Upcoming Events</p>
                <?php } ?>
            </div>
            <div class="section">
                <h2>On-going Events</h2>
                <?php
                    $ongoingQuery = "SELECT * FROM events WHERE eventDate = CURDATE()";
                    $ongoingResult = mysqli_query($conn, $ongoingQuery);
                    while($row = mysqli_fetch_assoc($ongoingResult)){
                ?>
                <div class="event-box" id="event-box">
                    <img id="event-image" src="<?php echo $row['eventImg'] ?>" alt="event image">
                    <div class="event-details">
                        <h3><?php echo $row['eventName']?></h3>
                        <div class="row">
                            <div class="column-details">
                                <p class="bold">Date</p>
                                <p><?php echo $row['eventDate'] ?></p>
                            </div>
                            <div class="column-details">
                                <p class="bold">Venue</p>
                                <p><?php echo $row['eventVenue'] ?></p>
                            </div>
                        </div>
                        <div class="event-desc" id="event-desc">
                            <p><?php echo $row['eventDesc'] ?></p>
                        </div>
                        <div class="column-button">
                            <button class="btn-view">VIEW</button>
                        </div>
                    </div>
                </div>
                <?php }
                    if(mysqli_num_rows($ongoingResult) == 0) {
                ?>
                <p>No On-going Events</p>
                <?php } ?>
            </div>
            <div class="section">
                <h2>Past Events</h2>
                <?php
                    $pastQuery = "SELECT * FROM events WHERE eventDate < CURDATE()";
                    $pastResult = mysqli_query($conn, $pastQuery);
                    while($row = mysqli_fetch_assoc($pastResult)){
                ?>
                <div class="event-box" id="event-box">
                    <img id="event-image" src="<?php echo $row['eventImg'] ?>" alt="event image">
                    <div class="event-details">
                        <h3><?php echo $row['eventName']?></h3>
                        <div class="row">
                            <div class="column-details">
                                <p class="bold">Date</p>
                                <p><?php echo $row['eventDate'] ?></p>
                            </div>
                            <div class="column-details">
                                <p class="bold">Venue</p>
                                <p><?php echo $row['eventVenue'] ?></p>
                            </div>
                        </div>
                        <div class="event-desc" id="event-desc">
                            <p><?php echo $row['eventDesc'] ?></p>
                        </div>
                        <div class="column-button">
                            <button class="btn-view">VIEW</button>
                        </div>
                    </div>
                </div>
                <?php }
                    if(mysqli_num_rows($pastResult) == 0) {
                ?>
                <p>No Past Events</p>
                <?php } ?>
            </div>
            <div class="add-event"><a href="add-event.php" class="btn-edit">Add Event</a></div>
        </div>
    </main>
    <script>
        const buttons = document.querySelectorAll('.btn-view');

        buttons.forEach(button => {
            button.addEventListener('click', expand);
        });

        function expand(event) {
            const button = event.target;
            const section = button.closest('.section');
            const eventBox = button.closest('.event-box');
            const eventDetails = eventBox.querySelector('.event-details');
            const eventImage = eventBox.querySelector('img');
            const eventDesc = eventBox.querySelector('.event-desc');

            eventBox.classList.toggle('expanded-card');
            eventImage.classList.toggle('banner');
            eventDesc.classList.toggle('show-desc');
            section.classList.toggle('expanded-section');
            eventDetails.classList.toggle('to-left');

            button.innerHTML = button.innerHTML === 'VIEW' ? 'HIDE' : 'VIEW';
        }
    </script>
</body>
</html>