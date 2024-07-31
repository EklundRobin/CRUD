<?php
include_once "include/load.php";

$stmt = $con->prepare("SELECT * FROM people");
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD System</title>
</head>

<body>

    <div class="container-fluid">

        <?php if ($user->is_loggedin() != "") {
        ?>
            <a href="addpeople.php" class="btn btn-primary mb-2">Add People</a>
        <?php
        }
        if (isset($_GET['updated'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <p>Sucessfully edited person!</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_GET['deleted'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <p>Sucessfully deleted person!</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Post Code</th>
                    <th>Post Area</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($pplRow = $stmt->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $pplRow['ID'] ?></td>
                        <td><?php echo $pplRow['first_name'] ?></td>
                        <td><?php echo $pplRow['last_name'] ?></td>
                        <td><?php echo $pplRow['email'] ?></td>
                        <td><?php echo $pplRow['phone'] ?></td>
                        <td><?php echo $pplRow['p_address'] ?></td>
                        <td><?php echo $pplRow['post_code'] ?></td>
                        <td><?php echo $pplRow['post_area'] ?></td>
                        <td>
                            <?php if ($user->is_loggedin() != "") {
                            ?>
                                <a href="editpeople.php?id=<?php echo $pplRow['ID'] ?>" class="btn btn-warning">Edit</a>
                                <a href="deletepeople.php?id=<?php echo $pplRow['ID'] ?>" class="btn btn-danger">Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>