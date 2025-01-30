<?php
session_start();
include '../sessionCheck/sessionUser.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
$obj = new MyClass();

?>



<div class="container mt-16">
    <div class="text-end mb-3"><?php include 'funLoginProfile.php'; ?></div>

    <div class="">
        <?php include 'tabs.php'; ?>
    </div>

    <div class=" mx-auto p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="text-xl font-medium text-blue-800 mb-2">ประกาศของคุณ</div>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            ลำดับที่
                        </th>
                        <th scope="col" class="px-6 py-3" style="width: 40%;">
                            ชื่อประกาศ
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            ประเภท
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 15%;">
                            ราคา
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            จังหวัด
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 15%;">
                            วันที่/เดือน/ปี
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            แก้ไขประกาศ
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            ลบประกาศ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    $list = $con->prepare("SELECT * FROM property WHERE uid = ?");
                    $list->execute([$_SESSION["idUser"]]);
                    while ($r = $list->fetch(PDO::FETCH_ASSOC)) {
                        if ($r["se"] == "1" and $r["re"] == "0" and $r["do"] == "0") {
                            $status = "ขาย";
                            $price = $r["pt"];
                        } elseif ($r["se"] == "0" and $r["re"] == "1" and $r["do"] == "0") {
                            $status = "ให้เช่า";
                            $price = $r["prt"];
                        } elseif ($r["se"] == "1" and $r["re"] == "1" and $r["do"] == "0") {
                            $status = "ขายหรือให้เช่า";
                        } elseif ($r["se"] == "0" and $r["re"] == "0" and $r["do"] == "1") {
                            $status = "ขายดาวน์";
                        } elseif ($r["se"] == "1" and $r["re"] == "0" and $r["do"] == "1") {
                            $status = "ขายหรือขายดาวน์";
                            $price = $r["pt"];
                        } elseif ($r["se"] == "0" and $r["re"] == "1" and $r["do"] == "1") {
                            $status = "ให้เช่าหรือขายดาวน์";
                            $price = $r["prt"];
                        } elseif ($r["se"] == "1" and $r["re"] == "1" and $r["do"] == "1") {
                            $status = "ขายหรือให้เช่าหรือขายดาวน์";
                        }


                    ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <?= $n ?>
                            </th>
                            <td class="px-6 py-4 ">
                                <?= $r["ti"] ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?= $status ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?= $price  ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?= $r["pn"] ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?= $r["cr"] ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="edit.php?pd=<?= $r["pd"] ?>"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">แก้ไขประกาศ</a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ลบประกาศ</a></a>
                            </td>
                        </tr>
                    <?php
                        $n++;
                    }
                    ?>
                </tbody>
            </table>
        </div>





    </div>
</div>





<?php
include '../components/layoutFooter.php';
?>