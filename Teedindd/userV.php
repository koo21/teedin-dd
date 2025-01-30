<?php
session_start();
include '../sessionCheck/sessionAdmin.php';
include '../config/connect.php';
include 'myClass.php';
$obj = new MyClassAdmin;
$q = "%" . $_POST["text"] . "%";

$se = $con->prepare("SELECT * FROM users WHERE fn LIKE ? ");
$se->execute([$q]);
$r = $se->fetch(PDO::FETCH_ASSOC);

$pd = $con->prepare("SELECT * FROM property ");
$pd->execute();
$rowPd = $pd->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teedin DD</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>


    <?php include 'navber.php'; ?>
    <?php include 'menu.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <form class="max-w-sm" method="post" action="userShowV.php?p=uVip">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative mb-3 text-right">

                    <input type="search" id="default-search" name="search"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 searchText"
                        placeholder="ค้นหา" />
                    <button type="submit"
                        class="text-white absolute end-0.5 bottom-0.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>




            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3  text-center">
                                ลำดับที่
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                ชื่อ-นามสกุล
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                หัวข้อประกาศ
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                วันใช้งาน
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                วันใช้งานเพิ่มเติม
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                วันคงเหลือ
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                อมุมัติ VIP
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                ต่ออายุ VIP
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                ตั้งต่า VIP
                            </th>
                            <th scope="col" class="px-6 py-3  text-center">
                                ลบสมาชิก
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $perPage = 5;
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                        } else {
                            $page = 1;
                        }
                        $start = ($page - 1) * $perPage;
                        $seSearch = $con->prepare("SELECT * FROM property WHERE uid = ? AND vip = ? LIMIT {$start},{$perPage}");
                        $seSearch->execute([$r["uid"], 1]);
                        $n = $start + 1;
                        while ($row = $seSearch->fetch(PDO::FETCH_ASSOC)) {

                            $btnVip = $row["ap"] == 0 ? "" : "checked";

                            $datestart = $row["vs"];
                            $dateend = $row["vt"];

                            $calculate = strtotime("$dateend") - strtotime("$datestart");
                            $summary = floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)

                            $crEx = explode("-", $row["cr"]);
                            $part = $crEx[0] . "/" . $crEx[1] . "/";


                        ?>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <?= $n ?>
                            </th>
                            <td class="px-6 py-4 ">
                                <?php echo  $obj->fname($row["uid"]) ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <a href="detail.php?id=<?= $row["pd"] ?>&p=<?= $part ?>"><?= $row["ti"] ?></a>
                            </td>
                            <td class="px-6 py-4 text-center">

                            </td>
                            <td class="px-6 py-4 text-center">

                            </td>
                            <td class="px-6 py-4 text-center showDay">
                                <?= $summary ?> วัน
                            </td>
                            <td class="px-6 py-4  text-center">
                                <label class="inline-flex items-center me-5 cursor-pointer">
                                    <input type="checkbox" value="<?= $row["ap"]; ?>" class="sr-only peer vipNum"
                                        <?= $btnVip; ?>>
                                    <span class="me-3 text-sm  text-gray-900 dark:text-gray-300">ไม่อมุมัติ</span>
                                    <div data-id="<?= $row["pd"]; ?>"
                                        class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600 btnVip">
                                    </div>
                                    <span class="ms-3 text-sm  text-gray-900 dark:text-gray-300">อมุมัติ</span>
                                </label>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button data-id="<?= $row["pd"]; ?>"
                                    class="text-white bg-orange-500 hover:bg-orange-300 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-xs px-2 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 nextVip">ต่ออายุ
                                    VIP</button>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button type="button" data-modal-target="default-modal"
                                    data-modal-toggle="default-modal"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-2 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ตั้งต่า
                                    VIP</button>
                            </td>
                            <td class="text-center"><button type="button" data-id="<?= $row["pd"]; ?>"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-2 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 deleteUser">ลบสมาชิก</button>
                            </td>
                        </tr>
                        <?php
                            $n++;
                        }
                        ?>

                    </tbody>
                </table>
                <?php
                $seCount = $con->prepare("SELECT * FROM property WHERE uid = ? AND vip = ?");
                $seCount->execute([$r["uid"], 1]);
                $total_record = $seCount->rowCount(PDO::FETCH_ASSOC);
                $total_page = ceil($total_record / $perPage);
                ?>
            </div>

            <div class="flex justify-center items-center space-x-2 my-4">


                <a href="userV.php?p=uVip&page=1" aria-label="Previous"
                    class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    &nbsp;

                </a>
                <?php
                for ($i = 1; $i <= $total_page; $i++) {
                ?>
                <a href="userV.php?p=uVip&page=<?php echo $i; ?>"
                    class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md"><?php echo $i; ?></a>

                <?php
                }
                ?>

                <a href="userV.php?p=uVip&page=<?php echo $total_page; ?>" aria-label="Next"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">

                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    &nbsp;
                </a>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        ตั้งต่า VIP
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
                    <form action="insertAdmin.php?g=editVip" method="post">
                        <div class="mb-2">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ระดับ</label>
                            <select id="countries" name="level"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0">ระดับ</option>
                                <option value="1">หน้าแรก</option>
                                <option value="2">หน้าค้นหา</option>
                                <option value="3">หน้าจัังหวัด</option>
                                <option value="4">หน้าอำเภอ</option>
                                <option value="5">หน้าตำบล</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันใช้งาน</label>
                            <select id="countries" name="vipDay"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0">วันใช้งาน</option>
                                <?php

                                for ($i = 30; $i <= 360; $i += 30) {
                                    echo "<option value=$i>$i วัน</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="mb-2">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันใช้งานเพิ่มเติม</label>
                            <select id="countries" name="dayAddPlus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0">วันใช้งานเพิ่มเติม</option>
                                <?php
                                for ($i = 1; $i <= 30; $i++) {
                                    echo "<option value='$i'>$i วัน</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <input type="hidden" name="pd" value="<?= $$rowPd["pd"]; ?>">
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 btnEditVip">บันทึก</button>
                    </form>
                </div>
                <!-- Modal footer -->

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../components/summernote/summernote-bs5.css" rel="stylesheet">
    <script src="../components/summernote/summernote-bs5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

        $(".btnEditVip").click(function() {
            window.location.reload()
        })

        $(".btnVip").click(function() {
            var id = $(this).attr("data-id");
            var num = $(".vipNum").val();
            var g = "btnVip";

            $.ajax({
                type: "post",
                url: "insertAdmin.php?g=" + g,
                data: {
                    num: num,
                    idUser: id
                },
                success: function(response) {
                    console.log(response);
                }
            });

        });


        $(".nextVip").click(function() {
            var id = $(this).attr("data-id");
            Swal.fire({
                title: "ต่ออายุประกาศ ?",
                text: "คุณต้องการต่ออายุประกาศหรือไม่ ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ใช่",
                cancelButtonText: "ไม่ต่ออายุประกาศ"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "insertAdmin.php?g=nextVip&pd=" + id;
                    window.location.reload();
                }

            });
        });


        $('.deleteUser').click(function() {
            var id = $(this).attr("data-id");
            Swal.fire({
                title: "ลบข้อมูลสมาชิก ?",
                text: "คุณต้องการลบข้อมูลสมาชิกหรือไม่ ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ใช่",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "insertAdmin.php?g=dUserVip&pd=" + id;
                }

            });
        })
    })
    </script>
</body>

</html>