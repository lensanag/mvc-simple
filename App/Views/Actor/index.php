<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <td>
    <caption>Lista de actores</caption>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ultima actualizacion</th>
            <th>Edit</th>
        </tr>
<?php
    foreach ($actorList as $key => $item) {
?>
    <tr>
        <td>
<?php
        echo $item['actor_id'];
?>
        </td>
        <td>
<?php
        echo $item['first_name'];
?>
        </td>
        <td>
<?php
        echo $item['last_name'];
?>
        </td>
        <td>
<?php
        echo $item['last_update'];
?>
        </td>
        <td>
        <a href="/actor/edit?actor_id=<?php echo $item['actor_id'] ?>">Edit</a>
        </td>
    </tr>
<?php
    }
?>    
    </table>
</body>
</html>