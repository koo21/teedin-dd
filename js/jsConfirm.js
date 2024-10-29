function login(){
    Swal.fire({
        title: "ลงทะเบียนสำเร็จ",
        text: "สามารถเข้าระบบได้แล้ว!",
        icon: "success",
        timer:1500,
      }).then(function() {
        window.location.href = "login.php";
    });

    
}