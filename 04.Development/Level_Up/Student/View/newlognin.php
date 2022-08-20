
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form In PHP</title>
    <link rel="stylesheet" href="./newlognin.css">
</head>
<body>
<div id="container">
<h2>Login</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
<form action="../Controller//newlognincontroller.php" method="post">
            <input type="email" name="useremail" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="login" value="Login">
            </form>
</div>    
</body>