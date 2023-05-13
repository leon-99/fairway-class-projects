<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
</head>
<body>
    <h1>Edit Role</h1>
    <?php 
        include("mysql.php");
        $db = connect();
        $id = $_GET['id'];
        $sql = "SELECT * FROM roles WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->execute([":id" => $id]);
        $row = $statement->fetch();

    ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $row->id ?>">
        <input type="text" name="name" placeholder="Name" value="<?= $row->name ?>">
        <input type="text" name="value" placeholder="Value" value="<?= $row->value ?>">
        <button>Update Role</button>
    </form>
</body>
</html>