<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role List</title>
</head>
<body>
    <h1>Role List</h1>
    <?php
    include("mysql.php");
        $db = connect();

        $result = $db->query("SELECT * FROM roles");

        // need to get data using fetchAll on the result variable.
        $rows = $result->fetch();
        // instead of using fetchAll and forEach through the whole list, use while loop with fetch for perfomence.
        // fetch only get one row of data at a time.
    ?>

    <ul>
        <?php while($row = $result->fetch()):?>
            <!-- foreach function can be seperate using : and end it using endforeach in another php tag. -->
            <li>
                <!-- passing in the id of each user on the delete link. -->
                <a href="delete.php?id=<?= $row->id ?>">Delete</a>
                <a href="edit.php?id=<?= $row->id ?>">Edit</a>
                <?= $row->name ?> (<?= $row->value ?>)
            </li>
        <?php endwhile ?>
    </ul>
<br>
    <a href="new.php">Add New Role</a>
</body>
</html>