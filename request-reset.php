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
        <form action="send-email.php" method="post">
            <h4>Reset password</h4>
            <p>Enter the email address that associated with your account and we will send an email to reset your password.</p>
            <div class="form-box">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Send Email</button>
        </form>
    </main>
</body>
</html>