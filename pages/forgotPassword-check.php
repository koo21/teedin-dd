<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<?php


include '../config/connect.php';


$email = $_POST["email"];

$ed = $con->prepare("SELECT * FROM user WHERE em = ? ");
$ed->execute([$email]);
$r = $ed->fetch(PDO::FETCH_ASSOC);
if (!empty($ed)) {
  echo  '<script>
    $(document).ready(function(){
     Swal.fire({
         title: "ส่ง email",
         text: "ตรวจอีเมล์ของคุณเสร็จเรียบร้อยแล้ว",
         icon: "success",
       }).then(function() {
         window.location.href = "changePassword.php";
     });
    });
</script>';
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

?>