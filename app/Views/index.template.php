<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>

<h1>Login or <a href="/registration">register</a></h1>

<form method="post" action="/login">

    <label for="username">Username</label>
    <input type="text" name="username">
    <br> <br>
    <label for="password">Password</label>
    <input type="password" name="password">

    <button type="submit">Log in</button>


</form>
</body>
</html>