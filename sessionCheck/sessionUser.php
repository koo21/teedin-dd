<?php

if (empty($_SESSION["idUser"]) || empty($_SESSION["nameUser"]) || empty($_SESSION["passwordUser"])) {
    header("Location: login.php");
    exit();
}