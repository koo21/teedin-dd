<?php
session_start();

if (empty($_SESSION["admin"]) || empty($_SESSION["adminName"])) {
    header("location: index.php");
}
