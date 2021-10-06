<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO list</title>
</head>
<h1>TO DO list</h1>
<form action="/" method="post">
    <input type="text" name="item">
    <button type="submit">Submit</button>
</form>
<br>
<form action="/delete" method="post">
    <input type="number" name="itemToDelete">
    <button type="submit">Delete</button>
</form>

<?php
//var_dump($data);
foreach ($data as $key => $record) {
    echo "<p>$key $record[0]</p>";
}
?>



<body>

</body>
</html>