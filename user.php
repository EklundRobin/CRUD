<?php
include_once "include/load.php";

if (!$user->is_loggedin()) {
    $user->redirect("login.php");
}

$user_id = $_SESSION['user_session'];
$stmt = $con->prepare("SELECT * FROM users WHERE ID = :id");
$stmt->execute(array(":id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD System | Profile</title>
</head>

<body>
    <div class="container mt-5 d-flex">
        <div class="col">
            <h4>This is your profile</h4>
        </div>
        <div class="col">
            <h4>Update your info</h4>
            <?php
            if (isset($_GET['updatedinfo'])) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Updated your info
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php
            }
            ?>

            <form action="updatecontent.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $userRow['ID'] ?>">
                <div class="form-floating mb-2">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $userRow['user_fname'] ?>">
                    <label for="fname">First Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="umail" id="umail" class="form-control" placeholder="Email" value="<?php echo $userRow['user_mail'] ?>">
                    <label for="umail">Email</label>
                </div>
                <button type="submit" class="btn btn-warning w-100" name="update-user">Update your info</button>
            </form>
        </div>
    </div>
</body>

</html>