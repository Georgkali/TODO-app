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
<pre>
<?php
//var_dump($records);
?>
</pre>

<?php foreach ($records as $key => $record) {

    echo "<p> $key |  {$record->getDescription()} {$record->getStatus()} </p> 
<form action='/del' method='post'><button type='submit' name='id' value='{$record->getId()}'>X</button></form> ";
}
?>

<form action="/add" method="post">
    <input type="text" name="description">
    <button type="submit">Add</button>
</form>

<body>

</body>
</html>