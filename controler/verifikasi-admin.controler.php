<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verifikasi'])) {
    $usernameInput = $_POST['username'] ?? '';
    $passwordInput = $_POST['password'] ?? '';

    // Ganti sesuai username/password yang kamu inginkan
    $validUsername = 'admin';
    $validPassword = '1234';

    if ($usernameInput === $validUsername && $passwordInput === $validPassword) {
        $_SESSION["is-verify"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $_SESSION["is-verify"] = false;
        // Bisa beri pesan error, misal lewat GET parameter
        header("Location: verifikasi-admin.php?error=1");
        exit();
    }
}