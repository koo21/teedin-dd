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
        $key = substr(md5(date("YmdHis")), 0, 10);


        $re = $con->prepare("INSERT INTO users (fn,ln, em,pa,k,cr) VALUES (?,?,?,?,?,?)");
        $re->execute([$name, $lastName, $email, $password, $key, date("Y-m-d H:i:s")]);

        if (!$re) {
            header("Location: register.php");
        } else {
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
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    // สร้าง fun mail ////
}
?>