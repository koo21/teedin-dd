$(".sub").click(function(){
    if($("#registerName").val() == ""){
        $("#registerName").focus();
        Swal.fire({
            title: "ลงทะเบียน",
            text: "กรุณาใส่ชื่อ",
            icon: "warning"
          });
          return false;   
    }
    if($("#registerLastName").val() == ""){
    $("#registerLastName").focus();
        Swal.fire({
            title: "ลงทะเบียน",
            text: "กรุณาใส่นามสกุล",
            icon: "warning"
          });
          return false;   
    }

    if($("#registerEmail").val() == ""){
        $("#registerEmail").focus();
        Swal.fire({
            title: "ลงทะเบียน",
            text: "กรุณาใส่อีเมล์",
            icon: "warning"
          });

          return false;   
    }

    if($("#registerPassword").val() == ""){
        $("#registerPassword").focus();
        Swal.fire({
            title: "ลงทะเบียน",
            text: "กรุณาใส่รหัสผ่าน",
            icon: "warning"
          });

          return false;   
    }

    if($("#CRegisterPassword").val() == ""){
        $("#CRegisterPassword").focus();
        Swal.fire({
            title: "ลงทะเบียน",
            text: "กรุณาใส่ยืนยันรหัสผ่าน",
            icon: "warning"
          });

          return false;   
    }

    if($("#registerPassword").val() != $("#CRegisterPassword").val()){
        Swal.fire({
            title: "ลงทะเบียน",
            text: "รหัสผ่านไม่ตรงกัน",
            icon: "warning"
          });

          return false; 
    }

});

$(".subLogin").click(function(){
   

    if($("#registerEmail").val() == ""){
        $("#registerEmail").focus();
        Swal.fire({
            title: "เข้าสู่ระบบ",
            text: "กรุณาใส่อีเมล์",
            icon: "warning"
          });

          return false;   
    }

    if($("#registerPassword").val() == ""){
        $("#registerPassword").focus();
        Swal.fire({
            title: "เข้าสู่ระบบ",
            text: "กรุณาใส่รหัสผ่าน",
            icon: "warning"
          });

          return false;   
    }

   

});
