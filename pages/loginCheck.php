<?php
session_start();
include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $se = $con->prepare("SELECT * FROM users WHERE em = ? AND pa = ?");
    $se->execute([$email, $password]);

    if ($se->rowCount() > 0) {
        $r = $se->fetch(PDO::FETCH_ASSOC);
        $_SESSION["idUser"] = $r["uid"];
        $_SESSION["nameUser"] = $r["fn"] . " " . $r["ln"];
        $_SESSION["passwordUser"] = $r["pa"];
        header("Location: post.php");
    } else {
        $_SESSION["alert"] = "Invalid email or password.";
        header("Location: login.php");
    }
}
