<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>REGISTRAR</h4>
    <form action="/register" method="POST">
        <div>
            <label for="username">Username:</label><input name="username" id="username" type="text">
        </div>
        <br>
        <div>
            <label for="password">Password:</label><input name="password" id="password" type="password">
        </div>
        <input type="hidden" value="test">
        <div>
        <input type="submit" value="registrar">
        </div>
    </form>
</body>
</html>