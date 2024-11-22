<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<?php

use FFI\Exception;

include '../config/connect.php';

if ($_GET["g"] == "register") {
    // fn, em,pa,cr,k


    try {

        $name = $_POST["registerName"];
        $lastName = $_POST["registerLastName"];
        $email = $_POST["registerEmail"];
        $password = md5($_POST["CRegisterPassword"]);
        $t1 = $_POST["registerTel1"];
        $t2 = $_POST["registerTel2"];
        $li = $_POST["registerLId"];
        $key = substr(md5(date("YmdHis")), 0, 10);

        $se = $con->prepare("SELECT * FROM users WHERE em =?");
        $se->execute([$email]);

        $n = $se->rowCount();

        if ($n == 0) {
            $re = $con->prepare("INSERT INTO users (fn,ln, em,pa,t1,t2,li,k,cr) VALUES (?,?,?,?,?,?,?,?,?)");
            $re->execute([$name, $lastName, $email, $password, $t1, $t2, $li, $key, date("Y-m-d H:i:s")]);

            if (!$re) {
                header("Location: register.php");
            } else {

                // // สร้าง fun mail ////

                // $emailto = $email; //อีเมล์ผู้รับ
                // $link = $SitePath . "verified-email.php?uEmail=" . $email . "&key=" . $key;

                // $subject = 'TeedinDD ยืนยันอีเมล์'; //หัวข้อ
                // $header .= "Content-type: text/html; charset=utf8\r\n ";
                // $header .= "From: info@happinometer.com\r\n "; //ชื่อและอีเมลผู้ส่ง
                // $messages = "เรียนคุณ " . $name . " " . $lastName . ". <br><br>
                //         ยืนยันการสมัครสมาชิก teedindd.com<br/>
                //         ยืนยันการสมัครสมาชิกเว็บที่ดินดีดี<br/>
                //         <h2><a href='" . $link . "'>คลิ๊กที่นี่</a><h2>"; //ข้อความ

                // //***************************
                // $mail = new PHPMailer();
                // $mail->CharSet = "utf-8";
                // $mail->IsSMTP();
                // $mail->IsHTML(true);
                // $mail->SMTPDebug = 0;
                // $mail->Host = 'mail.teedindd.com';
                // $mail->Port = 587;
                // $mail->SMTPAuth = true;
                // $mail->Username = $sender;
                // $mail->Password = "sOAAiZv6J2";
                // $mail->From = $sender;
                // $mail->FromName = $sender;
                // $mail->Subject  = $subject;
                // $mail->Body     = $messages;
                // $mail->AltBody = "";
                // $mail->AddAddress($emailto);
                // $mail->Send();
                // //****************************



                echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลงทะเบียนสำเร็จ",
                 text: "สามารถเข้าระบบได้แล้ว!",
                 icon: "success",
                 timer:1500,
               }).then(function() {
                 window.location.href = "login.php";
             });
            });
     </script>';
            }
        } else {

            echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลงทะเบียนไม่สำเร็จ",
                 text: "ลงทะเบียนไม่สำเร็จ เนื่องจากอีเมลล์นี้มีการใช้งานแล้ว กรุณาตรวจสอบ",
                 icon: "warning",
                 timer:2500,
               }).then(function() {
                 window.location.href = "register.php";
             });
            });
     </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


if ($_GET["g"] == "addProfile") {

    $fn = $_POST["fname"]; //fn
    $ln = $_POST["lname"]; //ln
    $images = $_FILES["file"]["name"];
    if (empty($images)) {
        $pb = '';
    } else {
        $pic = explode(".", $images);
        $pb = "user/" . date("Y") . "/" . date("m") . "/" . time() . "." . end($pic);
        copy($_FILES["file"]["tmp_name"], "../th/img/" . $pb);
    } // pb
    $bo = $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"]; // bo
    $ge = $_POST["gentle"]; // ge
    $pid = $_POST["province"]; // pid
    $pv = $con->prepare(" SELECT * FROM province WHERE pid = ? "); //pid
    $pv->execute([$pid]);
    $rPv = $pv->fetch(PDO::FETCH_ASSOC);
    $pn = $rPv["name"]; //pn
    $amphurEx = explode("/", $_POST["amphur"]);
    $aid = $amphurEx[1]; //aid
    $ap = $con->prepare(" SELECT * FROM amphur WHERE aid = ? ");
    $ap->execute([$aid]);
    $rap = $ap->fetch(PDO::FETCH_ASSOC);
    $an = $rap["name"]; //an
    $districtEx = explode("/", $_POST["district"]);
    $did = $districtEx[2]; //did
    $di = $con->prepare(" SELECT * FROM district WHERE did = ? ");
    $di->execute([$did]);
    $rdi = $di->fetch(PDO::FETCH_ASSOC);
    $dn = $rdi["name"]; //dn
    $de = $_POST["detail"]; //de
    $ow = $_POST["owner"]; //ow
    $ag = $_POST["agent"]; //ag
    $ac = $_POST["agency"]; //ac
    $bu = $_POST["buyer"]; //bu
    $iv = $_POST["investor"]; //iv
    $t1 = $_POST["tel1"]; //t1
    $t2 = $_POST["tel2"]; //t2
    $li = $_POST["line"]; //li
    $fa = $_POST["facebook"]; //fa
    $ig = $_POST["instragram"]; //ig
    $tw = $_POST["twitter"]; //tw 
    $uid = $_POST["updateId"]; // uid

    try {

        $in = $con->prepare("UPDATE users SET ow = ?,ag= ?,ac = ?,bu = ?,iv= ?,de = ?,pid = ?,pn = ?,aid = ?,an = ?,did = ?,dn = ?,fn = ?,ln = ?,bo = ?,ge = ?,pb = ?,t1 = ?,t2 = ?,li = ?,tw = ?,ig = ?,fa = ? WHERE uid = ?");
        $in->execute([$ow, $ag, $ac, $bu, $iv, $de, $pid, $pn, $aid, $an, $did, $dn, $fn, $ln, $bo, $ge, $pb, $t1, $t2, $li, $tw, $ig, $fa, $uid]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_GET["g"] == "in") {


    // $sr = $_POST["sr"]; //sr
    // $re = $_POST["re"]; //re
    $se = 0;
    $re = 0;
    if ($_POST["sr"] == "se") {
        $se = 1;
    }
    if ($_POST["sr"] == "re") {
        $re = 1;
    }

    $cid = $_POST["land_type"]; //cid2
    $ti = $_POST["ti"]; //ti
    $d = $_POST["detail"]; //de
    $price = $_POST["price"];
    $bad_symbols = array(",", ".");
    $price = str_replace($bad_symbols, "", $price); //pt
    $am = $_POST["am"]; //am
    $am = str_replace($bad_symbols, "", $am); //am
    $pt = 0;
    $prt = 0;

    if ($_POST["sr"] == "se") {
        $pt =  $price;
    }
    if ($_POST["sr"] == "re") {
        $prt = $price;
    }
    echo $prt;
    $pid = $_POST["province"]; // pid
    $pv = $con->prepare(" SELECT * FROM province WHERE pid = ? "); //pid
    $pv->execute([$pid]);
    $rPv = $pv->fetch(PDO::FETCH_ASSOC);
    $pn = $rPv["name"]; //pn
    $amphurEx = explode("/", $_POST["amphur"]);
    $aid = $amphurEx[1]; //aid
    $ap = $con->prepare(" SELECT * FROM amphur WHERE aid = ? ");
    $ap->execute([$aid]);
    $rap = $ap->fetch(PDO::FETCH_ASSOC);
    $an = $rap["name"]; //an
    $districtEx = explode("/", $_POST["district"]);
    $did = $districtEx[2]; //did
    $di = $con->prepare(" SELECT * FROM district WHERE did = ? ");
    $di->execute([$did]);
    $rdi = $di->fetch(PDO::FETCH_ASSOC);
    $dn = $rdi["name"]; //dn

    $doc  = $_POST["doc"]; //doc
    $fl = $_POST["fl"]; //tl
    $be = $_POST["be"]; //be
    $ba = $_POST["ba"];
    $ca = $_POST["ca"];
    $la = $_POST["la"]; //la
    $lo = $_POST["lo"]; //lo
    $tel = $_POST["tel"]; //t1
    $li = $_POST["li"]; //li
    $newDateTime = date("Y-m-d H:i:s");


    $imagesCount = count($_FILES["file"]["name"]);
    for ($i = 0; $i <= $imagesCount; $i++) {

        $images = $_FILES["file"]["tmp_name"][$i];
        $new_images2 = $i . $_FILES["file"]["name"][$i];
        //copy($_FILES["fileImg"]["tmp_name"], "../images/product/" . $_FILES["fileImg"]["name"]);
        $width = 450; //*** Fix Width & Heigh (Autu caculate) ***//
        $size = GetimageSize($images);
        $height = round($width * $size[1] / $size[0]);
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
        ImageJPEG($images_fin, "../th/img/prop/" . date("Y") . "/" . date("m") . "/" . $new_images2);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);

        $nameImg .= $new_images2 . "/";
    }

    try {
        $in = $con->prepare("INSERT INTO property(cid2, se, re, pid, pn, aid, an, did, dn, la, lo, doc, ti, d, fl, be, ba, ca, am, pt,prt,cr) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $in->execute([$cid, $se, $re, $pid, $pn, $aid, $an, $did, $dn, $la, $lo, $doc, $ti, $d, $fl, $be, $ba, $ca, $am, $pt, $prt, $newDateTime]);
        if (!empty($in)) {
            echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลงประกาศสำเร็จ",
                 text: "ลงประกาศสำเร็จเรียบร้อยแล้ว!",
                 icon: "success",
                 timer:1500,
               }).then(function() {
                 window.location.href = "post.php";
             });
            });
     </script>';;
        } else {
            echo '<script>
            $(document).ready(function(){
             Swal.fire({
                 title: "ลงประกาศไม่สำเร็จ",
                 text: "ลงประกาศไม่สำเร็จ เนื่องจากอีเมลล์นี้มีการใช้งานแล้ว กรุณาตรวจสอบ",
                 icon: "warning",
                 timer:2500,
               }).then(function() {
                 window.location.href = "post.php";
             });
            });
     </script>';;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>