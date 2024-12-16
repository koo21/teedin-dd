<?php
session_start();
if ($_SESSION["idUser"] == "") {
    $register = '<button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="menuitem text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ลงประกาศฟรี</button>';
} else {
    $register = '<a href="post.php" type="button"
                            class="menuitem text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ลงประกาศฟรี</a>';
}
?>
<div class="relative z-10">
    <div class="container-fluid fixed top-0  bg-gray-300">
        <div class="container  ">
            <div class="col-md-12 flex  justify-between justify-items-center items-center">
                <div class="logo"><img src="../storage/images/logo.png" alt="Teedin DD" srcset=""></div>

                <div class="menu ">
                    <ul class="ulMenu ">
                        <li><a href="index.php" class="menuitem "><i class="bi bi-house-fill"></i> หน้าแรก</a></li>

                        <li><a href="" class="menuitem ">ลงโฆษณาที่ดิน</a></li>
                        <li><a href="" class="menuitem ">ค้นหา</a></li>
                        <li><a href="" class="menuitem ">ติดต่อเรา</a></li>

                        <li><?= $register; ?></li>
                        <li>
                            <div class="cursor-pointer text-slate-500 hover:text-blue-600"
                                data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                                เข้าสู่ระบบ</div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

</div>






<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    ยินดีต้อนรับเข้าสู่ Teedin DD.com
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flex justify-center my-4">
                            <div class="me-3 loginForm cursor-pointer text-slate-500 hover:text-green-600 ">
                                <i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ
                            </div>
                            <div class="registerForm cursor-pointer text-slate-500 hover:text-green-600 ">
                                <i class="bi bi-pencil-square"></i> สมัครสมาชิก
                            </div>
                        </div>
                        <div class="showLoginFormAndRegisterForm"></div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <img src="../storage/images/teedin-dd.png" class="mb-3 w-full rounded-lg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".showLoginFormAndRegisterForm").load('formLogin.php');

        $(".loginForm").click(function(e) {

            $(".registerForm").css('border-bottom', 'none');
            e.preventDefault();
            $(".loginForm").css('border-bottom', '6px solid #2d8902');
            $(".showLoginFormAndRegisterForm").load('formLogin.php');
        })

        $(".registerForm").click(function(e) {
            $(".loginForm").css('border-bottom', 'none');
            e.preventDefault();
            $(".registerForm").css('border-bottom', '6px solid #2d8902');
            $(".showLoginFormAndRegisterForm").load('formRegister.php');
        })
        //$('.ulMenu .menuitem').click(function(e) {

        //    $('.active').removeClass('active');
        //    $(this).addClass('active');

        //})
    })



    // $(window).scroll(function() {
    //     if ($(this).scrollTop() > 120) {
    //         $('.header').addClass('fixed ');
    //     } else {
    //         $('.header').removeClass('fixed');;
    //     }
    // });
</script>