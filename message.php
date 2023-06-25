<?php
    session_start();
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
            <li class="nav-item"><a href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item"><a href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item active"><a class="active" href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item"><a href="merch.php"><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a></li>
        </ul>
    </div>
    <main class="message-page">
        <div class="card message-card">
            <div class="message-body">
                <?php
                    $sql = "SELECT l.*, m.* FROM message_log l, members m WHERE l.membersID = m.membersID ORDER BY l.sentDate ASC, l.sentTime ASC";
                    $result = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_assoc($result)) {
                        if($data['membersID'] == $_SESSION['membersID']){
                            $messageClass = 'sent';
                            $bubbleName = 'You';
                        }
                        else{
                            $messageClass = 'received';
                            $bubbleName = $data['membersName'];
                        }
                ?>
                <div class="<?php echo $messageClass;?>">
                    <p class="message-date"><?php echo date('d F, g.i A', strtotime($data['sentDate'] . ', ' . $data['sentTime']))?></p>
                    <div class="message-content">
                        <img src="<?php echo $data['membersImg'] ?>" alt="">
                        <div class="message-text">
                            <span class="triangle-to-left">◄</span>
                            <p class="message-name"><?php echo $bubbleName ?></p>
                            <p><?php echo $data['messageContent'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="message-field">
                <form action="send-message.php" method="post">
                    <div class="form-control">
                        <input type="text" name="message" id="message-input">
                    </div>
                    <button id="btn-send" type="submit" disabled><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </main>
    <script>
        const form = document.querySelector('form');
        const messageInput = document.querySelector('#message-input');
        const btnSend = document.querySelector('#btn-send');
        messageInput.addEventListener('input', () => {
            if(messageInput.value.length > 0){
                btnSend.removeAttribute('disabled');
                btnSend.style.backgroundColor = 'rgb(243, 225, 128)';
            }
        });

        const arrowIcon = btnSend.querySelector('i');

        btnSend.addEventListener('click', function() {
            arrowIcon.classList.add('clicked');
            btnSend.setAttribute('disabled', true);
            setTimeout(function() {
                arrowIcon.classList.remove('clicked');
                form.submit();
            }, 1000);
        });

        window.addEventListener('load', function() {
            var messageBody = document.querySelector('.message-body');
            messageBody.scrollTop = messageBody.scrollHeight;
        });

        var typingTimer; 
        var typingInterval = 2000; 

        document.addEventListener('keydown', function() {
            clearTimeout(typingTimer);
            disableAutoRefresh(); 
        });

        document.addEventListener('keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(enableAutoRefresh, typingInterval);
        });

        function disableAutoRefresh() {
            clearInterval(autoRefreshTimer); 
        }

        function enableAutoRefresh() {
            window.location.reload(); 
        }

        var autoRefreshTimer = setInterval(enableAutoRefresh, 7000);
    </script>
</body>
</html>