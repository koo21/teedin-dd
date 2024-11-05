<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<?php
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

                // สร้าง fun mail ////

                $emailto = $email; //อีเมล์ผู้รับ
                $link = $SitePath . "verified-email.php?uEmail=" . $email . "&key=" . $key;

                $subject = 'TeedinDD ยืนยันอีเมล์'; //หัวข้อ
                $header .= "Content-type: text/html; charset=utf8\r\n ";
                $header .= "From: info@happinometer.com\r\n "; //ชื่อและอีเมลผู้ส่ง
                $messages = "เรียนคุณ " . $name . " " . $lastName . ". <br><br>
                        ยืนยันการสมัครสมาชิก teedindd.com<br/>
                        ยืนยันการสมัครสมาชิกเว็บที่ดินดีดี<br/>
                        <h2><a href='" . $link . "'>คลิ๊กที่นี่</a><h2>"; //ข้อความ

                //***************************
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->IsHTML(true);
                $mail->Host = 'mail.happinometer.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = $sender;
                $mail->Password = "sOAAiZv6J2";
                $mail->From = $sender;
                $mail->FromName = $sender;
                $mail->Subject  = $subject;
                $mail->Body     = $messages;
                $mail->AltBody = "";
                $mail->AddAddress($emailto);
                $mail->Send();
                //****************************



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


if ($_GET["g"] == "in") {


    $in = $con->prepare("INSERT INTO property (se,)");
}
?>