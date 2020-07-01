<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>LOGIN</h4>
    <form action="/login" method="POST">
        <div>
            <label for="username">Username:</label><input name="username" id="username" type="text">
        </div>
        <br>
        <div>
            <label for="password">Password:</label><input name="password" id="password" type="password">
        </div>
        <input type="submit" value="login">
        <input type="hidden" name="target" value="<?php echo urlencode($incomig); ?>"> 
    </form>
</body>
</html>