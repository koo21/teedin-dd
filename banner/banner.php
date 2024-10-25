<div class="container-fluid bg-gray-300 border-1 border-indigo-200 border-b-gray-900">
    <div class="container">
        <div class="col-md-12 flex justify-between justify-items-center items-center">
            <div class="logo"><img src="../storage/images/logo.png" alt="Teedin DD" srcset=""></div>
            <div class="menu">
                <ul class="ulMenu">
                    <li><a href="index.php" class="menuitem active"><i class="bi bi-house-fill"></i> หน้าแรก</a></li>
                    <li><a href="" class="menuitem ">ลงประกาศฟรี</a></li>
                    <li><a href="" class="menuitem ">ลงโฆษณาที่ดิน</a></li>
                    <li><a href="" class="menuitem ">ค้นหา</a></li>
                    <li><a href="" class="menuitem ">ติดต่อเรา</a></li>
                    <li><a href="" class="menuitem ">สมัครสมาชิก</a></li>
                    <li><a href="" class="menuitem ">เข้าสู่ระบบ</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {

        $('.ulMenu .menuitem').click(function(e) {
            e.preventDefault();
            $('.active').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>