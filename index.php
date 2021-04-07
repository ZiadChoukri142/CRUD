<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'process.php'; ?>
<div class="container">
<?php   $mysqli = new mysqli('localhost', 'root', '', 'crud2') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        //pre_r($result);
?>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
                </tr>
            </thead>
<?php
    while($row = $result->fetch_assoc()):
?>
            <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
            <?php endwhile; ?>
    </div>

<?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '<pre>';
        }
?>
<div class="row justify-content-center">
    <form action="process.php" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="Enter your name">
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="Enter your location">
        </div>
        <div class="from-group">
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>
</div>
    </form>
    </div>
</body>
</html>