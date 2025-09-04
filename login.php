<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Please enter both username and password.";
        header("Location: login_form.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, username, password_hash, first_name, last_name, email FROM tbl_employee WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password_hash']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            header("Location: forgot-password.html");
            exit;
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: login_form.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Username not found.";
        header("Location: login_form.php");
        exit;
    }
}
?>
