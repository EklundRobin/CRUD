<?php
include_once "include/load.php";

if (!$user->is_loggedin()) {
    $user->redirect("login.php");
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['update-user'])) {
    $id = $_POST['id'];
    $fname = clean_input($_POST['fname']);
    $umail = clean_input($_POST['umail']);

    try {
        $stmt = $con->prepare("UPDATE users SET user_fname = :fname, user_mail = :umail WHERE ID = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":umail", $umail);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $user->redirect("user.php?updatedinfo");
}

if (isset($_POST['add-person'])) {
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $umail = clean_input($_POST['umail']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    $postcode = clean_input($_POST['postCode']);
    $postarea = clean_input($_POST['postArea']);

    try {
        $stmt = $con->prepare("INSERT INTO people (first_name, last_name, email, phone, p_address, post_code, post_area) VALUES (:fname, :lname, :umail, :phone, :p_address, :postCode, :postArea)");
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam("lname", $lname);
        $stmt->bindParam(":umail", $umail);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":p_address", $address);
        $stmt->bindParam(":postCode", $postcode);
        $stmt->bindParam(":postArea", $postarea);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $user->redirect("addpeople.php?added");
}

if (isset($_POST['update-person'])) {
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $umail = clean_input($_POST['umail']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    $postcode = clean_input($_POST['postCode']);
    $postarea = clean_input($_POST['postArea']);

    try {
        $stmt = $con->prepare('UPDATE people SET first_name = :fname, last_name = :lname, email = :umail, phone = :phone, p_address = :p_address, post_code = :postCode, post_area = :postArea');
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam("lname", $lname);
        $stmt->bindParam(":umail", $umail);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":p_address", $address);
        $stmt->bindParam(":postCode", $postcode);
        $stmt->bindParam(":postArea", $postarea);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $user->redirect("index.php?updated");
}

if (isset($_POST['delete-person'])) {
    $ID = $_POST['ID'];

    try {
        $stmt = $con->prepare('DELETE FROM people WHERE ID = :id');
        $stmt->bindParam(':id', $ID);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $user->redirect("index.php?deleted");
}
