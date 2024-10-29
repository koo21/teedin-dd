<?php
include '../config/connect.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
?>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <div class="max-w-3xl p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800
            dark:border-gray-700">
                <div class="text-2xl font-medium text-success mb-5"><i class="fa-solid fa-pen-to-square"></i>
                    สมัครสมาชิก</div>
                <div class="text-xl font-base text-blue-500 mb-2"> รายละเอียด</div>


                <form action="insertData.php?g=register" method="post">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ
                            </label>
                            <input type="" id="registerName" name="registerName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล
                            </label>
                            <input type="" id="registerLastName" name="registerLastName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมลล์</label>
                        <input type="email" id="registerEmail" name="registerEmail"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-2">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสผ่าน</label>
                        <input type="password" id="registerPassword" name="registerPassword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-2">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ยืนยันรหัสผ่าน</label>
                        <input type="password" id="CRegisterPassword" name="CRegisterPassword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mt-3 mb-5">

                        <button type="submit"
                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800 sub">สมัครสมาชิก</button>
                    </div>
                </form>
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">

                    <span class="text-md ">* ที่ดินดีดี.คอม คือเว็บไซต์ที่ให้บริการลงประกาศ ขาย,
                        เช่าที่ดินทุกประเภท
                        สามารถลงประกาศได้ฟรี</span><br>
                    <span class="text-md ">* ทางเว็บไซต์ขอสงวนสิทธิ์ในการจัดการข้อมูลที่ไม่เหมาะสม
                        โดยไม่จำเป็นต้องแจ้งให้ท่านทราบล่วงหน้า</span><br>
                    <span class="text-md ">* สำหรับท่านที่มีปัญหาการสมัครสมาชิก โปรดติดต่อ
                        teedinddonline@gmail.com</span>
                </div>


            </div>

        </div>
        <div class="col-md-3"></div>
    </div>

    <script src="../js/checkAlert.js"></script>




    <?php
    include '../components/layoutFooter.php';
    ?>