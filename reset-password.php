<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-COMPASS</title>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>e-COMPASS</h1>
        <div class="nav">
            <ul>
                <li><a href="index.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </header>
    <main>
        <form action="change-password.php?membersID=<?php echo $_GET['membersID']; ?>" method="post">
            <h4>Enter new password</h4>
            <div class="form-box">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
                <i id="eye-shown" class="fa-solid fa-eye"></i>
                <i id="eye-hidden" class="fa-solid fa-eye-slash"></i>
            </div>
            <button type="submit">Save</button>
        </form>
    </main>
    <script src="script/index.js"></script>
</body>
</html>