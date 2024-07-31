<?php
include_once "include/load.php";

if (isset($_POST['btn-register'])) {
    $umail = trim($_POST['umail']);
    $upass = trim($_POST['upass']);

    if ($umail == " ") {
        $error = "Please provide an email address";
    } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error = "Please provide a valid email address";
    } else if ($upass == " ") {
        $error = "Please provide a password";
    } else if (strlen($upass < 8)) {
        $error = "Password must be equal to or longer than 8 characters";
    } else {
        try {
            $stmt = $con->prepare("SELECT user_mail FROM users WHERE user_mail = :umail");
            $stmt->execute(array(":umail" => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['user_mail'] == $umail) {
                $error = "Email is aldreay in use!";
            } else {
                if ($user->register($umail, $upass)) {
                    $user->redirect("login.php?user_registered");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
                <h1 class="h3 mb-3 fw-normal">Please Enter Details</h1>
                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <p><?php echo $error ?></p>
                    </div>
                <?php
                }
                ?>

                <div class="form-floating">
                    <input type="email" name="umail" id="umail" class="form-control" placeholder="Email">
                    <label for="umail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="upass" id="upass" class="form-control" placeholder="Password">
                    <label for="upass">Password</label>
                </div>
                <div class="form-check text-start my-3">
                    <input type="checkbox" id="tnc" class="form-check-input">
                    <label for="tnc">I Accept the Terms and Contidions</label>
                </div>
                <button type="submit" name="btn-register" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </main>
</body>

</html>