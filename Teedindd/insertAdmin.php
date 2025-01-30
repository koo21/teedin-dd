<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<?php
session_start();
include '../config/connect.php';


if ($_GET["g"] == "check") {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $ch = $con->prepare("SELECT * FROM admin WHERE ad_username = ? AND ad_password = ?");
    $ch->execute([$user, $pass]);
    $count = $ch->rowCount();

    if ($count == 1) {
        $row = $ch->fetch(PDO::FETCH_ASSOC);
        $_SESSION["admin"] = $row["ad_id"];
        $_SESSION["adminName"] = $row["ad_username"];
        header("location: Dashboard.php");
    } else {
        header("location: index.php");
    }
}

if ($_GET["g"] == "btnVip") {
    $num = $_POST["num"];
    if ($num == 1) {
        $num = 0;
    } else {
        $num = 1;
    }
    $idUser = $_POST["idUser"];
    $se = $con->prepare("UPDATE property SET ap = ? WHERE pd = ?");
    $se->execute([$num, $idUser]);
}

if ($_GET["g"] == "dUser") {
    $idUser = $_GET["pd"];

    $se = $con->prepare("SELECT * FROM property WHERE pd = ?");
    $se->execute([$idUser]);
    $row = $se->fetch(PDO::FETCH_ASSOC);

    $deleteFodderEx = explode("-", $row["cr"]);
    $deleteFodder = $deleteFodderEx[0] . "/" . $deleteFodderEx[1] . "/";

    $seImage = $con->prepare("SELECT * FROM image WHERE pd = ?");
    $seImage->execute([$idUser]);
    while ($rowImage = $seImage->fetch(PDO::FETCH_ASSOC)) {
        $path = "../th/img/prop/" . $deleteFodder  . $rowImage["a"];

        if (@unlink($path)) {
        } else {
            echo "error";
        }
    }

    $de = $con->prepare("DELETE FROM property WHERE pd = ?");
    $de->execute([$idUser]);
    $deImag = $con->prepare("DELETE FROM image WHERE pd = ?");
    $deImag->execute([$idUser]);
    if ($de) {
        echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลบข้อมูลสมาชิกสำเร็จ",
                 text: "ลบข้อมูลสมาชิกเรียบร้อยแล้ว!",
                 icon: "success",
                 timer:1500,
               }).then(function() {
                 window.location.href = "users.php?p=u";
             });
            });
     </script>';
    }
}

if ($_GET["g"] == "dUserVip") {
    $idUser = $_GET["pd"];

    $se = $con->prepare("SELECT * FROM property WHERE pd = ?");
    $se->execute([$idUser]);
    $row = $se->fetch(PDO::FETCH_ASSOC);

    $deleteFodderEx = explode("-", $row["cr"]);
    $deleteFodder = $deleteFodderEx[0] . "/" . $deleteFodderEx[1] . "/";

    $seImage = $con->prepare("SELECT * FROM image WHERE pd = ?");
    $seImage->execute([$idUser]);
    while ($rowImage = $seImage->fetch(PDO::FETCH_ASSOC)) {
        $path = "../th/img/prop/" . $deleteFodder  . $rowImage["a"];

        if (@unlink($path)) {
        } else {
            echo "error";
        }
    }

    $de = $con->prepare("DELETE FROM property WHERE pd = ?");
    $de->execute([$idUser]);
    $deImag = $con->prepare("DELETE FROM image WHERE pd = ?");
    $deImag->execute([$idUser]);
    if ($de) {
        echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลบข้อมูลสมาชิกสำเร็จ",
                 text: "ลบข้อมูลสมาชิกเรียบร้อยแล้ว!",
                 icon: "success",
                 timer:1500,
               }).then(function() {
                 window.location.href = "userV.php?p=uVip";
             });
            });
     </script>';
    }
}

if ($_GET["g"] == "editVip") {
    $pd = $_POST["pd"];
    $vip = $_POST["level"];
    $vipDay = $_POST["vipDay"];
    $dayAddPlus = $_POST["dayAddPlus"];

    $dateVip = date("Y-m-d");

    $vip_new = $vipDay + $dayAddPlus;
    $date = date_create(date("Y-m-d"));
    date_add($date, date_interval_create_from_date_string($vip_new . " days"));
    echo $dateVipEdit =  date_format($date, "Y-m-d");

    $se = $con->prepare("UPDATE property SET vip = ?, vs = ?, vt = ? WHERE pd = ?");
    $se->execute([$vip, $dateVip, $dateVipEdit, $pd]);
}


if ($_GET["g"] == "nextVip") {
    $idUser = $_GET["pd"];
    $se = $con->prepare("SELECT * FROM property WHERE pd = ?");
    $se->execute([$idUser]);
    $row = $se->fetch(PDO::FETCH_ASSOC);
    $nextTime = $row["vt"];


    $DateBorrowing = $nextTime; //วันที่ปัจจุบัน
    //กำหนดคืน 7 วัน เปลี่ยนได้
    $DateReturnfix = date('Y-m-d', strtotime($DateBorrowing . ' + 60 days'));


    $se = $con->prepare("UPDATE property SET vt = ? WHERE pd = ?");
    $se->execute([$DateReturnfix, $idUser]);
    // if ($se) {
    //     echo '<script>
    //         $(document).ready(function(){
    //          Swal.fire({
    //              title: "แก้ไขสถานะสมาชิกสำเร็จ",
    //              text: "แก้ไขสถานะสมาชิกเรียบร้อยแล้ว!",
    //              icon: "success",
    //              timer:1500,
    //            });
    //         });
    //  </script>';
    // }
}