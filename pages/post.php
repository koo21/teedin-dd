<?php
include '../config/connect.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
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
            <div
                class="max-w-4xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <form action="" method="post" enctype="multipart/form-data">



                    <div class="text-2xl font-bold text-success mb-2"><i class="fa-solid fa-bullhorn"></i> ลงประกาศใหม่
                    </div>
                    <div class="text-xl font-base text-blue-500 mb-2">รายละเอียดที่ดิน (กรุณาลงประกาศเฉพาะ ที่ดิน
                        เท่านั้น)</div>
                    <hr>
                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">

                        <div class="">
                            <label for="" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">
                                ประเภทประกาศ</label>

                            <div class="flex items-center h-5 ">
                                <input id="remember" type="radio" value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                    required />
                                <label for="remember" class="ms-2 text-md  text-gray-900 dark:text-gray-300">ขาย</label>
                            </div>


                            <div class="flex items-center h-5">
                                <input id="remember" type="radio" value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                    required />
                                <label for="remember"
                                    class="ms-2 text-md  text-gray-900 dark:text-gray-300">สำหรับเช่า</label>
                            </div>
                        </div>

                        <div>
                            <label for="land_type"
                                class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">ประเภทที่ดิน</label>
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
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">หัวข้อประกาศ</label>
                        <input type="text" id="" value="" name=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="detail"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รายละเอียดของประกาศ</label>
                        <textarea id="detail" rows="4" name=""
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ราคา</label>
                        <input type="text" id="" value="" name=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">จังหวัด</label>
                            <select id="" name="pvi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""> -- กรุณาเลือก --</option>
                                <?php
                                $pv = $con->prepare("SELECT * FROM province");
                                $pv->execute();
                                while ($row = $pv->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['pid'] . '">' . $row['name'] . '</option>';
                                }
                                ?>

                            </select>

                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เขต /
                                อำเภอ</label>
                            <select id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""> -- กรุณาเลือก --</option>
                                <?php
                                $pv = $con->prepare("SELECT * FROM amphur ");
                                $pv->execute();
                                while ($row = $pv->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['pid'] . '">' . $row['name'] . '</option>';
                                }
                                ?>

                            </select>

                        </div>
                        <div>
                            <label for="land_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">แขวง / ตำบล</label>
                            <select id="land_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""> -- กรุณาเลือก --</option>
                                <option value="1"></option>
                                <option value="2">Canada</option>
                                <option value="3">France</option>
                                <option value="4">Germany</option>
                                <option value="5">Germany</option>
                                <option value="6">Germany</option>
                                <option value="7">Germany</option>
                                <option value="8">Germany</option>

                            </select>

                        </div>


                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ละติจูด</label>
                            <input type="text" id="" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ลองติจูด</label>
                            <input type="text" id="" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">รูปภาพ</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" name="file[]"
                            accept="image/png,image/jpeg" multiple>


                    </div>

                    <div class="p-4 text-md text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                        role="alert ">
                        <div class="text-xl font-base text-blue-500 mb-2">รายละเอียดผู้ประกาศ สำหรับติดต่อกลับ</div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อประกาศ</label>
                                <input type="text" id="" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรศัพท์</label>
                                <input type="text" id="" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมลล์</label>
                                <input type="text" id="" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LINE
                                    ID</label>
                                <input type="text" id="" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สร้างรหัสผ่าน</label>
                                <input type="text" id="" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                        </div>
                    </div>

                    <div class="mt-3">

                        <button type="submit"
                            class="text-white bg-green-500  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-green-500 dark:focus:ring-blue-800">ลงประกาศ</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>

<?php include_once 'modelSearch.php'; ?>



<?php
include '../components/layoutFooter.php';
?>