<?php
session_start();
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
$obj = new MyClass();

$se = $con->prepare("SELECT * FROM users WHERE uid = ? ");
$se->execute([$_SESSION["idUser"]]);
$r = $se->fetch(PDO::FETCH_ASSOC);


?>



<div class="container mt-3">
    <div class="text-end mb-3">สวัสดีคุณ : <?= $_SESSION["nameUser"] ?> | <a href="logout.php" class="text-red-500"><i
                class="bi bi-door-closed"></i>
            ออกจากระบบ</a></div>

    <div
        class="max-w-[220px] mx-auto p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="text-xl font-medium text-blue-800 mb-2">ข้อมูลสมาชิก</div>


        <div class="mb-4 mt-4 text-center">
            <img class="rounded-full mx-auto w-36 h-36" id="blah" src="../storage/images/noimage.jpg"
                alt="Extra large avatar">

        </div>


        <form action="profile.suss" method="post" enctype="multipart/form-data">

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ
                    </label>
                    <input type="text" id="text" name="fn" value="<?= $r["fn"] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        นามสกุล</label>
                    <input type="text" id="text" name="ln" value="<?= $r["ln"] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="user_avatar">รูป</label>


                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="imgInp" type="file" name="file[]" multiple
                    accept="image/jpg">
                <p id="helper-text-explanation" class="mt-2 text-sm text-red-500 dark:text-gray-400">
                    หมายเหตุ รูปภาพที่ใส่ต้องเป็นนามสกุล jpg เท่านั้น</p>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        วันเกิด</label>
                    <select id="day" name="day"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="0">-- วันเกิด --</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo '<option value="' . sprintf("%02d", $i) . '">' . sprintf("%02d", $i) . '</option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        เดือนเกิด</label>
                    <select id="month" name="month"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="0">-- เดือนเกิด --</option>
                        <?php
                        include '../array/thaiMonth.php';
                        for ($i = 1; $i < count($months); $i++) {
                            echo '<option value="' . $months[$i] . '">' . $months[$i] . '</option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        ปีเกิด</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="0">-- ปีเกิด --</option>
                        <?php
                        $nowYear = (date("Y") + 543) - 5;
                        for ($i = ($nowYear - 95); $i <= $nowYear; $i++) {
                            echo '<option value="' . $i . '">' . $i  . '</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เพศ</label>
                <select id="sex" name="sex"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value="0">กรุณาเลือกเพศ</option>
                    <option value="1">ชาย</option>
                    <option value="2">หญิง</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่</label>
                <select id="province" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">
                    <option value="0"> -- กรุณาเลือกจังหวัด --</option>
                    <?= $obj->province(); ?>

                </select>

            </div>

            <div class="showAmphur mb-3"></div>

            <div class="mb-3">

                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เกี่ยวกับคุณ</label>
                <textarea id="message" rows="4" name="detail"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คุณคือ</label>
                <div class="flex items-center mb-2">
                    <input id="checkbox-1" type="checkbox" value="1" name="ow"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-1" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">
                        เจ้าของทรัพย์ (Owner)</label>
                </div>

                <div class="flex items-center mb-2">
                    <input id="checkbox-2" type="checkbox" value="1" name="ag"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-2" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">นายหน้า
                        (Agent)</label>
                </div>

                <div class="flex items-center mb-2">
                    <input id="checkbox-3" type="checkbox" value="1" name="ae"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-3" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">บริษัทอสังหาริมทรัพย์
                        (Agency)</label>
                </div>
                <div class="flex items-center mb-2">
                    <input id="checkbox-2" type="checkbox" value="1" name="bu"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-2" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">ผู้ซื้อ
                        (Buyer)</label>
                </div>

                <div class="flex items-center mb-2">
                    <input id="checkbox-3" type="checkbox" value="1" name="iv"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-3" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">นักลงทุน
                        (Investor)</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                    role="alert">
                    <div class="text-xl font-base text-blue-800 mb-2">การติดต่อ</div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-3">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โทรศัพท์
                            </label>
                            <input type="text" id="text" name="t1" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-3">

                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โทรศัพท์
                            </label>
                            <input type="text" id="text" name="t2" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Line ID
                        </label>
                        <input type="text" id="text" name="li" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                        </label>
                        <input type="text" id="text" name="fa" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.facebook.com/xxx" />
                    </div>
                    <div class="mb-3">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instragram
                        </label>
                        <input type="text" id="text" name="" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.instragram.com/xxx" />
                    </div>
                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                        </label>
                        <input type="text" id="text" name="ig" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.twitter.com/xxx" />
                    </div>
                </div>


            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">บันทึกข้อมูล</button>
        </form>

    </div>

</div>

<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }


    $(document).ready(function() {
        $(".showAmphur").load('searchAmphur.php');

        $('.province').change(function() {
            let povData = $(this).val();
            let url = 'searchAmphur.php';

            $.post(url, {
                povData: povData
            }, function(data) {
                $(".showAmphur").html(data);
            });
        })
    })
</script>




<?php
include '../components/layoutFooter.php';
?>