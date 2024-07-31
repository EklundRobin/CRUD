<?php
include_once "include/load.php";

if (!$user->is_loggedin()) {
    $user->redirect("index.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM people WHERE ID = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $usrRow = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <h2>Delete - <?php echo $usrRow['first_name'] ?></h2>
        <a href="index.php" class="btn btn-primary mb-3">Back to list</a>

        <div class="text-center">
            <h2>Are you sure you want to delete <?php echo $usrRow['first_name'] ?>?</h2>
            <form action="updatecontent.php" method="POST" class="d-grid">
                <input type="hidden" name="ID" value="<?php echo $usrRow['ID'] ?>">
                <button type="submit" name="delete-person" class="btn btn-danger">YES</button>
            </form>
        </div>
    </div>
</body>

</html>