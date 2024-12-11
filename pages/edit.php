<?php
session_start();
include '../sessionCheck/sessionUser.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
$obj = new MyClass();

//echo $_GET["pd"];
$pb = $con->prepare("SELECT * FROM property WHERE pd = ?");
$pb->execute([$_GET["pd"]]);
$row = $pb->fetch(PDO::FETCH_ASSOC);

$_SESSION["amp"] = $row["aid"];
$_SESSION["amp"] = $row["aid"];
$_SESSION["ampName"] = $row["an"];
$_SESSION["province"] = $row["pid"];
$_SESSION["dis"] = $row["did"];
$_SESSION["disName"] = $row["dn"];

$crEx = explode("-", $row["cr"]);
$part = $crEx[0] . "/" . $crEx[1] . "/";
$uid = $row["uid"];
$se = $row["se"];
echo $re = $row["re"];
echo $do = $row["do"];
$pt = $row["pt"];
$prt = $row["prt"];
if ($se == "1" and $re == "0" and $do == "0") {
    $status = "ขาย";
    $price = $pt;
} elseif ($se == "0" and $re == "1" and $do == "0") {
    $status = "ให้เช่า";
    $price = $prt;
} elseif ($se == "1" and $re == "1" and $do == "0") {
    $status = "ขายหรือให้เช่า";
} elseif ($se == "0" and $re == "0" and $do == "1") {
    $status = "ขายดาวน์";
} elseif ($se == "1" and $re == "0" and $do == "1") {
    $status = "ขายหรือขายดาวน์";
    $price = $pt;
} elseif ($se == "0" and $re == "1" and $do == "1") {
    $status = "ให้เช่าหรือขายดาวน์";
    $price = $prt;
} elseif ($se == "1" and $re == "1" and $do == "1") {
    $status = "ขายหรือให้เช่าหรือขายดาวน์";
}
$cid = $row["cid2"];
$ti =  $row["ti"];
$d =  $row["d"];
$pid =  $row["pid"];
$pn = $row["pn"];
$aid = $row["aid"];
$an = $row["an"];
$did = $row["did"];
$dn = $row["dn"];
$la = $row["la"];
$lo = $row["lo"];
$docName = $row["doc"];
$fl = $row["fl"];
$be = $row["be"];
$ba = $row["ba"];
$ca = $row["ca"];
$am = $row["am"];
$id = $row["pd"];

?>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet'
    type='text/css' />



<div class="container">

    <div class=" mt-3">

        <div class="text-end mb-3">
            <?php include 'funLoginProfile.php'; ?>
        </div>


        <div class="">
            <a type="button" href="listDetailPost.php"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i
                    class="bi bi-caret-left"></i> กลับ</a>

        </div>

        <div
            class=" mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form action="insertData.php?g=ed" method="post" enctype="multipart/form-data">



                <div class="text-xl font-medium text-blue-800 mb-5"><i class="bi bi-megaphone-fill"></i>
                    แก้ไขประกาศของคุณ
                </div>
                <div class="text-xl font-base text-blue-500 mb-2">รายละเอียดที่ดิน (กรุณาลงประกาศเฉพาะ ที่ดิน
                    เท่านั้น)</div>
                <hr>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">

                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            * ประเภทประกาศ</label>
                        <div class="flex">

                            <?php
                            if ($row["se"] == 1) {
                                $seCheck = 'checked';
                            } else {
                                $seCheck = '';
                            }
                            ?>
                            <div class="flex items-center h-5 me-5">

                                <input id="sr1" type="checkbox" value="1" name="se"
                                    <?php echo $row["se"] == 1 ? 'checked' : "" ?>
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">ขาย</label>
                            </div>


                            <div class="flex items-center h-5 me-5">

                                <input id="sr2" type="checkbox" value="1" name="re"
                                    <?php echo $re == 1 ? 'checked' : 'unchecked' ?>
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">สำหรับเช่า</label>
                            </div>

                            <div class="flex items-center h-5">

                                <input id="sr3" type="checkbox" value="1" name="do"
                                    <?php echo $do == 1 ? 'checked' : "" ?>
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">ขายดาวน์</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="land_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            ประเภทที่ดิน</label>
                        <select id="land_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="land_type">


                            <?php

                            if (!empty($cid)) {

                                echo '<option value="' . $cid . '">' . $obj->land_typeName($cid) . '</option>';
                            } else {
                                echo '<option value="0"> -- กรุณาเลือก --</option>';
                            }
                            ?>
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
                    <input type="text" id="ti" value="<?php echo $ti ?>" name="ti"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-6">
                    <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        รายละเอียดของประกาศ</label>
                    <textarea id="example" rows="4" name="detail" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        selector">
                    <?php echo $d ?>
                    </textarea>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        ขนาดที่ดิน(ตารางเมตร) <span class="text-red-500 font-normal">ไม่ต้องใส่ลูกน้ำ ( ,
                            )</span></label>
                    <input type="text" id="am" value="<?php echo $am ?>" name="am" onchange="JavaScript:chkNum1(this)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        ราคา <span class="text-red-500 font-normal">ไม่ต้องใส่ลูกน้ำ ( , )</span></label>
                    <input type="text" id="price" value="<?php echo $price ?>" name="price"
                        onchange="JavaScript:chkNum(this)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>



                <div class="mb-6">
                    <label for="doc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        ประเภทโฉนดที่ดิน</label>
                    <select id="doc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="doc">


                        <?php
                        include '../array/thaiMonth.php';
                        if (!empty($docName)) {
                            echo '<option value="' . $docName . '">' . $doc[(int)$docName] . '</option>';
                        } else {
                            echo '<option value="0">-- กรุณาเลือก --</option>';
                        }


                        for ($i = 1; $i <= (count($doc) - 1); $i++) {
                            echo '<option value="' . $i . '">' . $doc[$i] . '</option>';
                        }
                        ?>



                    </select>

                </div>


                <div class="grid md:grid-cols-4 md:gap-6 mb-6">
                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชั้น</label>
                        <input type="text" id="fl" value="<?php echo $fl ?>" name="fl"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องนอน</label>
                        <input type="text" id="be" value="<?php echo $be ?>" name="be"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>

                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องน้ำ</label>
                        <input type="text" id="ba" value="<?php echo $ba ?>" name="ba"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โรงรถ</label>
                        <input type="text" id="ca" value="<?php echo $ca ?>" name="ca"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        จังหวัด</label>
                    <select id="province" name="province"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">

                        <?php
                        if (!empty($r["pid"])) {
                            echo '<option value="' . $r["pid"] . '">' . $r["pn"] . '</option>';
                        }


                        ?>
                        <option value="0"> -- กรุณาเลือก --</option>
                        <?= $obj->province(); ?>

                    </select>

                </div>

                <div class="showAmphur mb-3"></div>




                <!-- <div class="">
                    
                    <iframe width="100%" height="400" frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyByt7XDNDutI_B8i-0TWqLRa2OfoVDWkhI&q=<?php echo $la . ',' . $lo; ?>&maptype=satellite"
                        allowfullscreen>
                    </iframe>
                </div> -->

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ละติจูด</label>
                        <input type="text" id="la" value="<?php echo $la  ?>" name="la"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ลองติจูด</label>
                        <input type="text" id="lo" value="<?php echo $lo ?>" name="lo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>

                <div class="mb-6">
                    <div class="text-end">
                        <button type="button"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">ลบรูปภาพเก่า</button>

                    </div>
                    <div class="h-[50px] w-full grid grid-cols-5 gap-3 md:h-[100px] lg:h-[150px]">
                        <?php
                        $mte = $con->prepare("SELECT * FROM image WHERE pd = ? ");
                        $mte->execute([$_GET["pd"]]);
                        while ($rowImage = $mte->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                            <div class="">
                                <img src="../th/img/prop/<?= $part . $rowImage["a"] ?>" alt="" srcset=""
                                    class="h-[50px] w-full mx-auto object-cover rounded-xl md:h-[100px] lg:h-[150px] lg:w-full lg:object-cover ">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">*
                        รูปภาพ</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 filePic"
                        aria-describedby="file_input_help" id="file_input" type="file" name="file[]" accept="image/jpg"
                        multiple>

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
                            <input type="text" id="tel" value="<?php echo  $obj->telFull($uid) ?>" name="tel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>

                        <div class="">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                LINE
                                ID</label>
                            <input type="text" id="lineID" value="<?php echo  $obj->lineID($uid) ?>" name="li"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>


                    </div>
                </div>



                <div class="mt-3">
                    <input type="hidden" name="idPd" value="<?php echo $id ?>">
                    <input type="hidden" name="idUser" value="<?php echo $_SESSION["idUser"]  ?>">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 post">บันทึกข้อมูล</button>

                </div>
            </form>
        </div>
    </div>

</div>

<?php
include '../components/layoutFooter.php';
?>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'>
</script>
<script type="text/javascript" src="../slick/slick/slick.min.js"></script>

<script>
    var editor = new FroalaEditor('#example', {
        //pluginsEnabled: ['align', 'fontSize'],
        toolbarButtons: ['bold', 'italic', 'textColor', 'backgroundColor', 'fontSize', 'align'],
        //pluginsEnabled: ['align', 'fontSize', 'textColor', 'backgroundColor'],
        fontSizeSelection: true,
        fontSize: ['8', '10', '12', '14', '18', '30', '60', '96'],
        colorsBackground: [
            '#15E67F', '#E3DE8C', '#D8A076', '#D83762', '#76B6D8', 'REMOVE',
            '#1C7A90', '#249CB8', '#4ABED9', '#FBD75B', '#FBE571', '#FFFFFF'
        ],
        colorsText: ['#15E67F', '#E3DE8C', '#D8A076', '#D83762', '#76B6D8', 'REMOVE',
            '#1C7A90', '#249CB8', '#4ABED9', '#FBD75B', '#FBE571', '#FFFFFF'
        ]


    });




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
        ele.value = addCommas(num);
    }

    function addCommas1(nStr) {
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

    function chkNum1(ele) {
        var num = parseFloat(ele.value);
        ele.value = addCommas1(num);
    }

    $(document).ready(function() {




        // load more content


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


            // if ($("#am").val() == "") {
            //     $("#am").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ขนาดที่ดิน",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#doc").val() == "") {
            //     $("#doc").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่โฉนดที่ดิน",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#fl").val() == "") {
            //     $("#fl").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ชั้น",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#be").val() == "") {
            //     $("#be").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ห้องนอน",
            //         icon: "warning"
            //     });

            //     return false;
            // }
            // if ($("#ba").val() == "") {
            //     $("#ba").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ห้องน้ำ",
            //         icon: "warning"
            //     });

            //     return false;
            // }
            // if ($("#ca").val() == "") {
            //     $("#ca").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่โรงรถ",
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

            // if ($("#tel").val() == "") {
            //     $("#tel").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่เบอร์โทรศัพท์",
            //         icon: "warning"
            //     });

            //     return false;
            // }

            // if ($("#lineID").val() == "") {
            //     $("#lineID").focus();
            //     Swal.fire({
            //         title: "ลงประกาศ",
            //         text: "กรุณาใส่ LINE ID",
            //         icon: "warning"
            //     });

            //     return false;
            // }



        });


        $(".showAmphur").load('searchAmphur.php');

        $('.province').mouseover(function() {
            let povData = $(this).val();
            let url = 'searchAmphur.php';

            $.post(url, {
                povData: povData
            }, function(data) {
                $(".showAmphur").html(data);
            });
        })

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