<?php
session_start();
include '../sessionCheck/sessionUser.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
$obj = new MyClass();

$se = $con->prepare("SELECT * FROM users WHERE uid = ? ");
$se->execute([$_SESSION["idUser"]]);
$r = $se->fetch(PDO::FETCH_ASSOC);

$_SESSION["amp"] = $r["aid"];
$_SESSION["amp"] = $r["aid"];
$_SESSION["ampName"] = $r["an"];
$_SESSION["province"] = $r["pid"];
$_SESSION["dis"] = $r["did"];
$_SESSION["disName"] = $r["dn"];

if (!empty($r["pb"])) {
    $imgUser = '../th/img/' . $r["pb"] . '';
} else {
    $imgUser = '../th/img/user/noimage.jpg';
}



?>



<div class="container mt-16">
    <div class="text-end mb-3"><?php include 'funLoginProfile.php'; ?></div>

    <div class="">
        <?php include 'tabs.php'; ?>
    </div>

    <div class="mx-auto p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="text-xl font-medium text-blue-800 mb-2">ข้อมูลสมาชิก</div>


        <div class="mb-4 mt-4 text-center">
            <img class="rounded-full mx-auto w-36 h-36" id="blah" src="<?= $imgUser; ?>" alt="Extra large avatar">
            <div class="text-center mt-2 "><i class="bi bi-envelope-at"></i>
                E-mail : <?= $r["em"] ?> </div>
        </div>


        <form action="insertData.php?g=addProfile" method="post" enctype="multipart/form-data">

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ
                    </label>
                    <input type="text" id="text" name="fname" value="<?= $r["fn"] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-3">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        นามสกุล</label>
                    <input type="text" id="text" name="lname" value="<?= $r["ln"] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="user_avatar">รูป</label>


                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="imgInp" type="file" name="file" accept="image/jpg">
                <p id="helper-text-explanation" class="mt-2 text-sm text-red-500 dark:text-gray-400">
                    หมายเหตุ รูปภาพที่ใส่ต้องเป็นนามสกุล jpg เท่านั้น</p>
            </div>

            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เพศ</label>
                <select id="gentle" name="gentle"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php
                    if ($r["ge"] == "male") {
                        echo '<option value="male">ชาย</option>';
                        echo '<option value="">กรุณาเลือกเพศ</option>';
                    } else if ($r["ge"] == "female") {
                        echo '<option value="female">หญิง</option>';
                        echo '<option value="">กรุณาเลือกเพศ</option>';
                    } else {
                        echo ' <option value="">กรุณาเลือกเพศ</option>';
                    }
                    ?>
                    <option value="male">ชาย</option>
                    <option value="female">หญิง</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่</label>
                <select id="province" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">
                    <?php
                    if (!empty($r["pid"])) {
                        echo '<option value="' . $r["pid"] . '">' . $r["pn"] . '</option>';
                    }
                    ?>
                    <option value="0"> -- กรุณาเลือกจังหวัด --</option>
                    <?= $obj->province(); ?>

                </select>

            </div>

            <div class="showAmphur mb-3"></div>

            <div class="mb-3">

                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เกี่ยวกับคุณ</label>
                <textarea id="message" rows="4" name="detail"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $r["de"] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คุณคือ</label>
                <div class="flex items-center mb-2">
                    <?php if ($r["ow"] == 1) {
                        $ch = "checked";
                    } ?>
                    <input id="checkbox-1" type="checkbox" value="1" name="owner" <?= $ch ?>
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-1" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">
                        เจ้าของทรัพย์ (Owner)</label>
                </div>

                <div class="flex items-center mb-2">
                    <?php if ($r["ag"] == 1) {
                        $ch = "checked";
                    } ?>
                    <input id="checkbox-2" type="checkbox" value="1" name="agent" <?= $ch ?>
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-2" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">นายหน้า
                        (Agent)</label>
                </div>

                <div class="flex items-center mb-2">
                    <?php if ($r["ac"] == 1) {
                        $ch = "checked";
                    } ?>
                    <input id="checkbox-3" type="checkbox" value="1" name="agency" <?= $ch ?>
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-3" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">บริษัทอสังหาริมทรัพย์
                        (Agency)</label>
                </div>
                <div class="flex items-center mb-2">
                    <?php if ($r["bu"] == 1) {
                        $ch = "checked";
                    } ?>
                    <input id="checkbox-2" type="checkbox" value="1" name="buyer" <?= $ch ?>
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-2" class="ms-2 text-sm  text-gray-900 dark:text-gray-300">ผู้ซื้อ
                        (Buyer)</label>
                </div>

                <div class="flex items-center mb-2">
                    <?php if ($r["iv"] == 1) {
                        $ch = "checked";
                    } ?>
                    <input id="checkbox-3" type="checkbox" value="1" name="investor" <?= $ch ?>
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
                            <input type="text" id="text" name="tel1" value="<?= $r["t1"] ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-3">

                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โทรศัพท์
                            </label>
                            <input type="text" id="text" name="tel2" value="<?= $r["t2"] ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Line ID
                        </label>
                        <input type="text" id="text" name="line" value="<?= $r["li"] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                        </label>
                        <input type="text" id="text" name="facebook" value="<?= $r["fa"] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.facebook.com/xxx" />
                    </div>
                    <div class="mb-3">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instragram
                        </label>
                        <input type="text" id="text" name="instragram" value="<?= $r["ig"] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.instragram.com/xxx" />
                    </div>
                    <div class="mb-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                        </label>
                        <input type="text" id="text" name="twitter" value="<?= $r["tw"] ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.twitter.com/xxx" />
                    </div>
                </div>
                <input type="hidden" value="<?= $r["uid"] ?>" name="updateId">


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
        $(".showAmphur").load('searchAmphurProfile.php');

        $('.province').mouseover(function() {
            let povData = $(this).val();
            let url = 'searchAmphurProfile.php';

            $.post(url, {
                povData: povData
            }, function(data) {
                $(".showAmphur").html(data);
            });
        })

        $('.province').change(function() {
            let povData = $(this).val();
            let url = 'searchAmphurProfile.php';

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