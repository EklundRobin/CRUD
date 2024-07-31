<?php
include_once "include/load.php";

if (!$user->is_loggedin()) {
    $user->redirect("index.php");
}
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
    <div class="container">
        <h2>Add People</h2>
        <a href="index.php" class="btn btn-primary mb-3">Back to list</a>
        <?php
        if (isset($_GET['added'])) {
        ?>
            <div class="alert alert-success text-center">
                <p>Sucessfully added person!</p>
            </div>
        <?php
        }
        ?>
        <form action="updatecontent.php" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" autofocus>
                        <label for="fname">First Name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="umail" id="umail" class="form-control" placeholder="Email">
                        <label for="umail">Email</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                        <label for="phone">Phone</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="postCode" id="postCode" class="form-control" placeholder="Post Code">
                        <label for="postCode">Post Code</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="postArea" id="postArea" class="form-control" placeholder="Post Area">
                        <label for="postArea">Post Area</label>
                    </div>
                </div>
            </div>
            <button type="submit" name="add-person" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</body>

</html>