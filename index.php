<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Vehicle Data</title>
</head>

<body>
    <?php require_once 'process.php'; ?>

    <div class="container">
        <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '1234';
        $dbname = 'lab9';
        $mysqli =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$mysqli) {
            die('Could not connect: ' . mysqli_connect_error());
        }

        $result = $mysqli->query("SELECT * From vehicle") or die($mysqli->error);

        ?>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit Data</th>
                    <th>Delete data</th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) :
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
                    <td> <a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                <?php endwhile; ?>
                </tr>
        </table>



        <br>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table class="table">
                <tr>
                    <td><label for="">Name</label></td>
                    <td><input type="text" name="name" placeholder="Enter vehicle name" value="<?php echo $name ?>"></td>
                </tr>
                <tr>
                    <td><label for="">price</label></td>
                    <td><input type="text" name="price" placeholder="Enter vehicle price" value="<?php echo $price ?>"></td>
                </tr>



            </table>

            <br>


            <?php
            if ($update == true) :
            ?>
                <button type="submit" name="update">Update</button>
            <?php else : ?>
                <button type="submit" name="save">Save</button>
            <?php endif; ?>

        </form>
        <br>

        <input type="button" onclick="location.href='index.php';" value="HOME"> </input>

    </div>
</body>

</html>