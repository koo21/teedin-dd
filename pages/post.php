<?php
session_start();
include '../sessionCheck/sessionUser.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include '../fuc/checkName.php';
include_once 'myClass.php';
$obj = new MyClass();


$pb = $con->prepare("SELECT * FROM property WHERE uid = ?");
$pb->execute([$_SESSION["idUser"]]);
$row = $pb->fetch(PDO::FETCH_ASSOC);

?>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet'
    type='text/css' />



<div class="container">

    <div class="mt-16">

        <div class="text-end mb-3">
            <?php include 'funLoginProfile.php'; ?>
        </div>
        <div class="">
            <?php include 'tabs.php'; ?>
        </div>


        <div
            class=" mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form action="insertData.php?g=in" method="post" enctype="multipart/form-data">



                <div class="text-xl font-medium text-blue-800 mb-5"><i class="bi bi-megaphone-fill"></i> ลงประกาศใหม่
                </div>
                <div class="text-xl font-base text-blue-500 mb-2">รายละเอียด</div>
                <hr>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">

                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            * ประเภทประกาศ</label>
                        <div class="flex">

                            <div class="flex items-center h-5 me-5">
                                <input id="sr1" type="checkbox" value="1" name="se"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">ขาย</label>
                            </div>


                            <div class="flex items-center h-5 me-5">
                                <input id="sr2" type="checkbox" value="1" name="re"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 sr" />
                                <label for="" class="ms-2 text-md  text-gray-900 dark:text-gray-300">สำหรับเช่า</label>
                            </div>
                            <div class="flex items-center h-5">
                                <input id="sr3" type="checkbox" value="1" name="do"
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
                    <textarea id="summernote" rows="4" name="detail" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        selector">

                    </textarea>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-4">
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            ไร่</label>
                        <input type="number" id="" value="" name="ar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            งาน</label>
                        <input type="number" id="" value="" name="ag"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            วา</label>
                        <input type="number" id="" value="" name="aw"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            ขนาดที่ดิน(ตารางเมตร) <span class="text-red-500 font-normal">ไม่ต้องใส่ลูกน้ำ ( ,
                                )</span></label>
                        <input type="text" id="am" value="" name="am" onchange="JavaScript:chkNum1(this)"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        ราคา <span class="text-red-500 font-normal">ไม่ต้องใส่ลูกน้ำ ( , )</span></label>
                    <input type="text" id="price" value="" name="price" onchange="JavaScript:chkNum(this)"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>



                <div class="mb-6">
                    <label for="doc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        ประเภทโฉนดที่ดิน</label>
                    <select id="doc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="doc">
                        <option value=""> -- กรุณาเลือก --</option>

                        <?php
                        include '../array/thaiMonth.php';

                        for ($i = 1; $i <= (count($doc) - 1); $i++) {
                            echo '<option value="' . $i . '">' . $doc[$i] . '</option>';
                        }
                        ?>



                    </select>

                </div>


                <div class="grid md:grid-cols-4 md:gap-6 mb-6">
                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชั้น</label>
                        <input type="number" id="fl" value="" name="fl"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องนอน</label>
                        <input type="number" id="be" value="" name="be"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>

                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ห้องน้ำ</label>
                        <input type="number" id="ba" value="" name="ba"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่จอดรถ(คัน)</label>
                        <input type="number" id="ca" value="" name="ca"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
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




                <div class="mb-3 ">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                        พิกัดที่ดิน</label>
                    <div class="flex">

                        <a href="https://landsmaps.dol.go.th/" type="button" target="_blank"
                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 flex">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>


                            ค้นหาพิกัดที่ดิน
                        </a>
                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">วิธีทำพิกัดที่ดิน
                        </button>
                    </div>



                    <!-- <?php
                            $la = 13.81973;
                            $lo = 100.08067;

                            ?>
                    <iframe width="100%" height="400" frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyByt7XDNDutI_B8i-0TWqLRa2OfoVDWkhI&q=<?php echo $la . ',' . $lo; ?>&maptype=satellite"
                        allowfullscreen>
                    </iframe> -->
                </div>

                <!-- <div class="grid gap-6 mb-6 md:grid-cols-2">
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
                </div> -->

                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">*
                        รูปภาพ</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 filePic"
                        aria-describedby="file_input_help" id="file_input" type="file" name="file[]" accept="image/jpg"
                        multiple>

                    <p id="helper-text-explanation" class="mt-2 text-sm text-red-500 dark:text-gray-400">
                        ใส่รูปไม่เกิน 7 รูปภาพ หมายเหตุ รูปภาพที่ใส่ต้องเป็นนามสกุล jpg เท่านั้น</p>
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

                    <div class="mb-3">
                        <div class="text-xl font-medium text-green-800 mb-2">ต้องการลงประกาศ</div>
                        <div class="flex mb-3">
                            <div class="flex items-center h-5">
                                <input id="helper-radio1" aria-describedby="helper-radio-text" type="radio" value="1"
                                    name="vip"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="helper-radio"
                                    class="font-medium text-gray-900 dark:text-gray-300">VIP</label>
                                <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                    ประกาศของคุณจะอยู่หน้าแรกของเว็บไซต์(ต้องเสียค่าใช้จ่ายต่อเดือน)</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input id="helper-radio2" aria-describedby="helper-radio-text" type="radio" value="0"
                                    name="vip"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="helper-radio"
                                    class="font-medium text-gray-900 dark:text-gray-300">ธรรมดา</label>
                                <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                    ลงประกาศฟรี ไม่เสียค่าใช้จ่าย</p>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="mt-3">
                    <input type="hidden" name="idUser" value="<?php echo $_SESSION["idUser"]  ?>">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 post">บันทึกข้อมูล</button>

                </div>
            </form>
        </div>
    </div>

</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    ขั้นตอนการใช้งาน
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                <p class="text-base leading-relaxed text-gray-800 dark:text-gray-400">
                    1. เข้าไปที่เว็บไซต์ https://landsmaps.dol.go.th/<br>
                    2. เลือกจังหวัด - อำเภอ - กรอกเลขที่โฉนดที่ดิน แล้วคลิกที่ปุ่ม "ค้นหาข้อมูล"<br>
                    3.
                    ระบบจะแสดงรายละเอียดแปลงที่ดินที่คนพบในหน้าต่างค้นหาและมาร์คที่ตั้งแปลงที่ดินบนแผนที่ด้วยแถบสีส้ม<br>
                    4. การแสดงผลในมุมมอง Street View (ภาพเสมือนจริงของที่ดินแปลงนั้น ๆ) ให้คลิกเลือกเมนู “สตรีทวิว”
                    ระบบจะแสดงภาพมุมมอง Street View ของที่ดินแปลงนั้น ๆ ในหน้าต่างค้นหา โดยสามารถขยายภาพ มุมมอง Street
                    View ให้มีขนาดภาพที่กว้างจากเดิมได้โดยเลื่อนตัวชี้ Mouse
                </p>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">


            </div>
        </div>
    </div>
</div>

<?php
include '../components/layoutFooter.php';
?>



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

        $('#summernote').summernote({
            placeholder: 'ระบุรายละเอียด',
            tabsize: 2,
            height: 300
        });

        $('.filePic').change(function() {
            var numFiles = $(this)[0].files.length;
            if (numFiles > 7) {
                Swal.fire({
                    title: "รูปภาพ",
                    text: "กรุณาใส่รูปภาพไม่เกิน 7 รูป",
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


        $(".showAmphur").load('searchAmphurNewPost.php');

        $('.province').change(function() {
            let povData = $(this).val();
            let url = 'searchAmphurNewPost.php';

            $.post(url, {
                povData: povData
            }, function(data) {
                $(".showAmphur").html(data);
            });
        })

    });
</script>