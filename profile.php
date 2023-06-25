<?php
session_start();
require_once 'connect.php';

$membersID = $_SESSION['membersID'];
$query = "SELECT * FROM members WHERE membersID = '$membersID'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
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
            <li class="nav-item active"><a class="active" href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
            <li class="nav-item"><a href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item"><a href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item"><a href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item"><a href="merch.php"><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a>
            </li>
        </ul>
    </div>
    <main>
        <div class="card" id="profile-card">
            <div class="upper-side">
                <img src="<?php echo $data['membersImg']?>" alt="">
                <div class="side-info">
                    <h3 class="info"><?php echo $data['membersName'];?></h3>
                    <p class="info">Executive Member of Compass</p>
                    <h4 class="info"><?php echo $data['membersCity']?>, <?php echo $data['membersState']?></h4>
                </div>
            </div>
            <div class="lower-side">
                <div class="labelled-info">
                    <p class="label">Position</p>
                    <p class="data"><?php echo $data['membersPosition']?></p>
                </div>
                <div class="labelled-info">
                    <p class="label">Part</p>
                    <p><?php echo $data['membersPart']?></p>
                </div>
                <div class="labelled-info">
                    <p class="label">Phone Number</p>
                    <p><?php echo $data['membersPhone']?></p>
                </div>
                <div class="labelled-info">
                    <p class="label">Email
                    <p><?php echo $data['membersEmail']?></p>
                </div>
                <div class="labelled-info">
                    <p class="label">LinkedIn</p>
                    <p><?php echo $data['membersLinkedin']?></p>
                </div>
                <button type="button" class="btn-edit" id="btn-edit">Edit Profile</button>
            </div>
            <div class="card card-edit" id="card-edit">
                <form action="update-profile.php?membersID=<?php echo $data['membersID']?>" method="post">
                    <div class=" upper-side">
                        <img src="<?php echo $data['membersImg']?>" alt="">
                        <div class="side-info">
                            <input type="text" name="membersName" value="<?php echo $data['membersName']?>">
                            <input type="text" name="role" value="Executive Member of Compass">
                            <input type="text" name="address"
                                value="<?php echo $data['membersCity']?>, <?php echo $data['membersState']?>">
                        </div>
                    </div>
                    <div class="lower-side">
                        <div class="labelled-info">
                            <p class="label">Position</p>
                            <input type="text" name="position" value="<?php echo $data['membersPosition']?>">
                        </div>
                        <div class="labelled-info">
                            <p class="label">Part</p>
                            <input type="text" name="part" value="<?php echo $data['membersPart']?>">
                        </div>
                        <div class="labelled-info">
                            <p class="label">Phone Number</p>
                            <input type="text" name="phone" value="<?php echo $data['membersPhone']?>">
                        </div>
                        <div class="labelled-info">
                            <p class="label">Email
                            <Address></Address>
                            </p>
                            <input type="text" name="email" value="<?php echo $data['membersEmail']?>">
                        </div>
                        <div class="labelled-info">
                            <p class="label">LinkedIn</p>
                            <input type="text" name="linkedin" value="<?php echo $data['membersLinkedin']?>">
                        </div>
                        <div class="buttons">
                        <button class="btn-edit btn-cancel" id="btn-cancel">Cancel</button>
                            <button type="submit" class="btn-edit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
    const editBtn = document.getElementById('btn-edit');
    const cancelBtn = document.getElementById('btn-cancel');
    const profileCard = document.getElementById('profile-card');
    const editCard = document.getElementById('card-edit');

    editBtn.addEventListener('click', () => {
        editCard.style.display = 'block';
    });

    cancelBtn.addEventListener('click', () => {
        profileCard.style.display = 'block';
        editCard.style.display = 'none';
    })
    </script>
</body>

</html>