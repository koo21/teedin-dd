<?php
session_start();

include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
$obj = new MyClass();

?>



<?php
if (empty($_SESSION["idUser"]) || empty($_SESSION["nameUser"]) || empty($_SESSION["passwordUser"])) {
    $btnSub  =    '
<a href="login.php" type="button"
class="text-white bg-red-500  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-green-500 dark:focus:ring-red-800">ยังไม่สามารถลงประกาศได้ เนื่องจากยังไม่ Login เข้าสู่ระบบ</a>';

    $showAlert = '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <span class="font-medium"></span> <i class="bi bi-exclamation-triangle"></i>
</svg>
 ยังไม่สามารถลงประกาศได้ เนื่องจากยังไม่ Login เข้าสู่ระบบ
</div>';

    $showLogin = "";
} else {
    $btnSub  = '
<button type="submit"
class="text-white bg-green-500  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800 post">ลงประกาศ</button>';
    $showAlert = '';

    $showLogin = '<div class="text-end ">สวัสดีคุณ : ' . $_SESSION["nameUser"] . '</div>';
}

?>








<div class="container-fluid bkImg">
    <div class="container">
        <div class="text-3xl text-white text-center mb-2">ขายที่ดิน บ้านมือสอง คอนโด ลงประกาศฟรี</div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-500 blur-none py-5 px-5 rounded-xl">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </div>
                        <input type="text" id="email-address-icon"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ค้นหาเขต, อำเภอ, เมือง" data-modal-target="search-modal"
                            data-modal-toggle="search-modal">
                    </div>
                    </form>

                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <?= $showAlert; ?>
            <div
                class="max-w-4xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <form action="insertData.php?g=in" method="post" enctype="multipart/form-data">

                    <?= $showLogin; ?>


                    <div class="text-2xl font-bold text-success mb-2"><i class="fa-solid fa-bullhorn"></i> ลงประกาศใหม่
                    </div>
                    <div class="text-xl font-base text-blue-500 mb-2">รายละเอียดที่ดิน (กรุณาลงประกาศเฉพาะ ที่ดิน
                        เท่านั้น)</div>
                    <hr>
                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">

                        <div class="">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                * ประเภทประกาศ</label>
                            <div class="flex">

                                <div class="flex items-center h-5 me-5">
                                    <input id="sr1" type="checkbox" value="1" name="sr"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                    <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">ขาย</label>
                                </div>


                                <div class="flex items-center h-5">
                                    <input id="sr2" type="checkbox" value="" name="re"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                    <label for=""
                                        class="ms-2 text-md  text-gray-900 dark:text-gray-300">สำหรับเช่า</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="land_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                ประเภทที่ดิน</label>
                            <select id="land_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="land_type">
                                <option value=""> -- กรุณาเลือก --</option>

                                <?php

                                $laType = $con->prepare("SELECT * FROM land_type");
                                $laType->execute();
                                while ($row = $laType->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                ?>



                            </select>

                        </div>

                    </div>

                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            หัวข้อประกาศ</label>
                        <input type="text" id="ti" value="" name="ti"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            รายละเอียดของประกาศ</label>
                        <textarea id="detail" rows="4" name="detail"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            ราคา <span class="text-red-500 font-normal">ไม่ต้องใส่ลูกน้ำ ( , )</span></label>
                        <input type="text" id="price" value="" name="price" onchange="JavaScript:chkNum(this)"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            จังหวัด</label>
                        <select id="province" name="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">
                            <?


                            ?>
                            <option value="0"> -- กรุณาเลือก --</option>
                            <?= $obj->province(); ?>

                        </select>

                    </div>

                    <div class="showAmphur mb-3"></div>






                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ละติจูด</label>
                            <input type="text" id="la" value="" name="la"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ลองติจูด</label>
                            <input type="text" id="lo" value="" name="lo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">*
                            รูปภาพ</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 filePic"
                            aria-describedby="file_input_help" id="file_input" type="file" name="file[]"
                            accept="image/jpg" multiple>

                        <p id="helper-text-explanation" class="mt-2 text-sm text-red-500 dark:text-gray-400">
                            ใส่รูปไม่เกิน 5 รูปภาพ หมายเหตุ รูปภาพที่ใส่ต้องเป็นนามสกุล jpg เท่านั้น</p>
                    </div>

                    <div class="p-4 text-md text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                        role="alert ">
                        <div class="text-xl font-base text-blue-500 mb-2">รายละเอียดผู้ประกาศ สำหรับติดต่อกลับ</div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">

                            <div class="">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    เบอร์โทรศัพท์</label>
                                <input type="text" id="tel" value="" name="tel"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                            <div class="">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    LINE
                                    ID</label>
                                <input type="text" id="lineID" value="" name="li"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>


                        </div>
                    </div>

                    <div class="mt-3">

                        <?php echo $btnSub; ?>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>

<script>
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function chkNum(ele) {
        var num = parseFloat(ele.value);
        ele.value = addCommas(num.toFixed(2));
    }

    $(document).ready(function() {

        $('.filePic').change(function() {
            var numFiles = $(this)[0].files.length;
            if (numFiles > 5) {
                Swal.fire({
                    title: "รูปภาพ",
                    text: "กรุณาใส่รูปภาพไม่เกิน 5 รูป",
                    icon: "warning"
                });
                $('.filePic').val("");
            }


        });


        $(".post").click(function() {

            // if ($(".sr:checked").length == "") {
            //     $(".sr").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ประเภทประกาศ",
            //         icon: "warning"
            //     });

            //     return false;
            // }
            // if ($("#land_type").val() == "") {
            //     $("#land_type").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ประเภทที่ดิน",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#ti").val() == "") {
            //     $("#ti").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่หัวข้อประกาศ",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#detail").val() == "") {
            //     $("#detail").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่รายละเอียดประกาศ",
            //         icon: "warning"
            //     });

            //     return false;
            // }
            // if ($("#price").val() == "") {
            //     $("#price").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ราคา",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#province").val() == "0") {
            //     $("#province").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่จังหวัด",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($(".amphur").val() == "0") {
            //     $(".amphur").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่เขต/อำเภอ",
            //         icon: "warning"
            //     });

            //     return false;
            // }


            // if ($(".district").val() == "0") {
            //     $(".district").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ตำบล",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#file_input").val() == "") {
            //     $("#file_input").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "ใส่รูปไม่เกิน 5 รูปภาพ หมายเหตุ รูปภาพที่ใส่ต้องเป็นนามสกุล jpg เท่านั้น",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            if ($("#tel").val() == "") {
                $("#tel").focus();
                Swal.fire({
                    title: "ลงประกาศ",
                    text: "กรุณาใส่เบอร์โทรศัพท์",
                    icon: "warning"
                });

                return false;
            }

            if ($("#lineID").val() == "") {
                $("#lineID").focus();
                Swal.fire({
                    title: "ลงประกาศ",
                    text: "กรุณาใส่ LINE ID",
                    icon: "warning"
                });

                return false;
            }



        });


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

    });
</script>



<?php include 'modelSearch.php'; ?>







<?php
include '../components/layoutFooter.php';
?>