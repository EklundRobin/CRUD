<?php
include_once "include/load.php";

if ($user->is_loggedin() != "") {
    $user->redirect("index.php");
}

if (isset($_POST['btn-login'])) {
    $umail = $_POST['umail'];
    $upass = $_POST['upass'];

    if ($user->login($umail, $upass)) {
        $user->redirect('index.php?loggedin');
    } else {
        $error = "Wrong details";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD System Register</title>
</head>

<body>
    <main class="container d-flex-align-items-center py-4">
        <div class="form-siginin w-100 m-auto">
            <form method="POST">
                <h1 class="h3 mb-3 fw-normal">Please Sign in</h1>
                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <p><?php echo $error; ?></p>
                    </div>
                <?php
                }
                if (isset($_GET['user_registered'])) {
                ?>
                    <div class="alert alert-success text-center">
                        <p>Sucessfully registerd new user!</p>
                    </div>
                <?php
                }
                ?>

                <div class="form-floating">
                    <input type="email" name="umail" id="umail" class="form-control" placeholder="Email" autofocus>
                    <label for="umail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="upass" id="upass" class="form-control" placeholder="Password">
                    <label for="upass">Password</label>
                </div>
                <button type="submit" name="btn-login" class="btn btn-primary w-100 my-2">Login</button>
            </form>
        </div>
    </main>
</body>

</html>