<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../View/newpassword.css">
</head>
<body>
<div id="container">
        <h2>Password</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="../Controller/newpasswordcontroller.php" method="POST">
            <input type="input" name="email" placeholder="Email" required><br>
            <input type="password" name="newpassword" placeholder="New Password" required><br>
            <input type="submit" name="changePassword" value="Save">
        </form>
    </div>
</body>
</html>