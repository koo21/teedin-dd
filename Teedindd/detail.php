<?php
session_start();
include '../sessionCheck/sessionAdmin.php';
include '../banner/banner.php';
include '../config/connect.php';
include '../pages/myClass.php';
$objShow = new MyClass();
$id  =  $_GET["id"];
$se = $con->prepare("SELECT * FROM property WHERE pd = ?");
$se->execute([$id]);
$rowSe = $se->fetch(PDO::FETCH_ASSOC);


$mg1 = $con->prepare("SELECT * FROM image WHERE pd = ? ");
$mg1->execute([$id]);
$rImg = $mg1->fetch(PDO::FETCH_ASSOC);

$img2 = 'https://madu-web.com/th/img/prop/' . $_GET["p"] . $rImg["a"] . '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teedin DD</title>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://madu-web.com" />
    <meta property="og:title" content="<?php echo $rowSe["ti"]; ?>">
    <meta property="og:description" content="<?php echo $rowSe["d"]; ?>">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta property="og:image" content="<?php echo $img2 ?>" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../components/summernote/summernote-bs5.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../slick/slick/slick.css">
    <link rel="stylesheet" href="../slick/slick/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v21.0">
    </script>


    <style>
        .slick-next {
            right: 10px;
            background: #ffff !important;
            border-radius: 50%;
        }

        .slick-prev {
            left: 10px;
            z-index: 2;
            background: #ffff !important;
            border-radius: 50%;
        }


        .slick-prev:before,
        .slick-next:before {
            color: rgb(0, 0, 0);
        }
    </style>
</head>

<body>

    <div class="container mt-16 mx-10">
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-6">
            <div class="px-2 md:col-span-2 xl:col-span-3 xl:col-start-2 ">

                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="index.php"
                                class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                หน้าหลัก
                            </a>
                        </li>

                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-blue-500 md:ms-2 dark:text-gray-400">ที่ดิน
                                    ให้เช่า</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <div class="mx-auto md:px-5 mt-5">
        <div class="grid grid-cols-1 gap-4  h-[300px] lg:w-full lg:h-[500px] lg:grid-cols-2 ">
            <div class="single-item cursor-pointer ">
                <?php
                $mt1 = $con->prepare("SELECT * FROM image WHERE pd = ? ");
                $mt1->execute([$id]);
                while ($row = $mt1->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="">
                        <img src="../th/img/prop/<?= $_GET["p"] . $row["a"] ?>" alt="" srcset=""
                            class="h-[300px]  lg:h-[500px] w-full mx-auto object-cover lg:rounded-xl">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class=" hidden lg:block cursor-pointer">
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 auto-rows-max px-3 h-[500px] mt-2.5 ">
                    <?php
                    $mt1 = $con->prepare("SELECT * FROM image WHERE pd = ? limit 1,4");
                    $mt1->execute([$id]);
                    while ($row = $mt1->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="h-60 gallery">
                            <a href="../th/img/prop/<?= $_GET["p"] . $row["a"] ?>"><img
                                    src="../th/img/prop/<?= $_GET["p"] . $row["a"] ?>" alt="" srcset=""
                                    class="h-full w-full object-cover rounded-xl"></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php



    $crEx = explode("-", $rowSe["cr"]);
    $crExtime = explode(" ", $crEx[2]);
    $DMY = $crExtime[0] . '/' . $crEx[1] . "/" . $crEx[0];

    if ($rowSe["se"] == "1" and $rowSe["re"] == "0" and $rowSe["do"] == "0") {
        $status = "ขาย";
        $price = number_format($rowSe["pt"]);
    } elseif ($rowSe["se"] == "0" and $rowSe["re"] == "1" and $rowSe["do"] == "0") {
        $status = "ให้เช่า";
        $price = number_format($rowSe["prt"]);
    } elseif ($rowSe["se"] == "1" and $rowSe["re"] == "1" and $rowSe["do"] == "0") {
        $status = "ขายหรือให้เช่า";
        $price = number_format($rowSe["pt"]);
    } elseif ($rowSe["se"] == "0" and $rowSe["re"] == "0" and $rowSe["do"] == "1") {
        $status = "ขายดาวน์";
        $price = number_format($rowSe["pt"]);
    } elseif ($rowSe["se"] == "1" and $rowSe["re"] == "0" and $rowSe["do"] == "1") {
        $status = "ขายหรือขายดาวน์";
        $price = number_format($rowSe["pt"]);
    } elseif ($rowSe["se"] == "0" and $rowSe["re"] == "1" and $rowSe["do"] == "1") {
        $status = "ให้เช่าหรือขายดาวน์";
        $price = number_format($rowSe["prt"]);
    } elseif ($rowSe["se"] == "1" and $rowSe["re"] == "1" and $rowSe["do"] == "1") {
        $status = "ขายหรือให้เช่าหรือขายดาวน์";
        $price = number_format($rowSe["prt"]);
    }

    //$countNum = $rowSe["hit"] + 1;

    // $up = $con->prepare("UPDATE property SET hit = ? WHERE pd = ?");
    // $up->execute([$countNum, $id]);



    ?>

    <div class="container mt-5 mx-10 ">
        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-6 gap-6">
            <div class="px-2 lg:col-span-2 xl:col-span-3 xl:col-start-2 ">
                <div class="mb-3 text-end"><span
                        class="bg-green-100 text-green-800 text-xs font-normal me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">วันที่ลงประกาศ
                        <?= $DMY ?></span></div>
                <div class="text-xl font-normal ">
                    <?= $rowSe["ti"] ?>
                </div>
                <div class="text-md font-extralight mt-2 md:flex md:justify-between md:items-center ">
                    <div class="flex items-center">
                        <svg height="20px" width="20px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                            fill="#a9a7a7" class="me-2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">

                                <g>
                                    <path class="st0"
                                        d="M256,0C160.798,0,83.644,77.155,83.644,172.356c0,97.162,48.158,117.862,101.386,182.495 C248.696,432.161,256,512,256,512s7.304-79.839,70.97-157.148c53.228-64.634,101.386-85.334,101.386-182.495 C428.356,77.155,351.202,0,256,0z M256,231.921c-32.897,0-59.564-26.668-59.564-59.564s26.668-59.564,59.564-59.564 c32.896,0,59.564,26.668,59.564,59.564S288.896,231.921,256,231.921z">
                                    </path>
                                </g>
                            </g>
                        </svg> <?= $rowSe["pn"] ?> - <?= $rowSe["an"] ?> - <?= $rowSe["dn"] ?>
                    </div>

                    <div class="fontNumber me-2 "><i class="bi bi-people-fill"></i> ผู้เข้าชม <?= 0 ?> ครั้ง
                    </div>
                </div>
                <div class="mt-2 mb-2 flex justify-between items-center ">
                    <div class="flex">
                        <h2 class="text-2xl md:text-3xl tracking-tight text-amber-600 dark:text-white fontNumber">
                            ฿ <?= $price ?> </h2>
                    </div>

                    <div class="me-2 flex items-center ">


                        <div class="line-it-button" data-lang="en" data-type="share-c" data-env="REAL"
                            data-url="http://madu-web.com/pages/detail.php?id=<?= $_GET["id"] ?>&p=<?= $_GET["p"] ?>"
                            data-color="default" data-size="small" data-count="false" data-ver="3"
                            style="display: none;"></div>

                        <div>
                            <a class="fb-h" onclick="return fbs_click()" target="_blank">
                                <img src="https://img.icons8.com/?size=100&id=118497&format=png&color=039BE5"
                                    width="36">
                            </a>
                        </div>





                    </div>
                </div>
                <div class="mt-4 rounded-lg border border-gray-100 bg-white p-4 shadow-sm transition hover:shadow-lg sm:p-6
                   ">
                    <p class="font-medium text-lg mb-2">ข้อมูลเบื้องต้น
                    </p>
                    <hr>
                    <div class="grid gird-cols-2  md:grid-cols-2 mt-2">
                        <div class="text-lg text-gray-600">
                            ชั้น
                            <br>
                            <p class="text-lg font-normal text-gray-400"><?= $rowSe["fl"] ?></p>
                        </div>
                        <div class="text-lg text-gray-600">
                            ห้องนอน
                            <br>
                            <p class="text-lg font-normal text-gray-400"><?= $rowSe["be"] ?></p>
                        </div>
                        <div class="text-lg text-gray-600">
                            ห้องน้ำ
                            <br>
                            <p class="text-lg font-normal text-gray-400"><?= $rowSe["ba"] ?></p>
                        </div>
                        <div class="text-lg text-gray-600">
                            โรงรถ
                            <br>
                            <p class="text-lg font-normal text-gray-400"><?= $rowSe["ca"] ?></p>
                        </div>
                        <div class="text-lg text-gray-600">
                            ขนาดที่ดิน
                            <br>
                            <p class="text-lg font-normal text-gray-400">
                                <?= $rowSe["ar"] ?> งาน
                                <?= $rowSe["ag"] ?> ไร่
                                <?= $rowSe["aw"] ?> วา
                                <?= number_format($rowSe["at"]) ?> ตร.วา
                                <?= number_format($rowSe["am"]) ?> ตร.เมตร
                            </p>

                        </div>
                        <div class="text-lg text-gray-600">พี่นที่ใช้สอย(ตารางเมตร)

                            <br>
                            <p class="text-lg font-normal text-gray-400">

                                <?= number_format($rowSe["au"]) ?> ตร.เมตร
                            </p>
                        </div>
                    </div>

                </div>
                <div class="mt-4 rounded-lg border border-gray-100 bg-white p-4 shadow-sm transition hover:shadow-lg sm:p-6
                    ">
                    <div class="font-medium text-lg mb-2">
                        รายละเอียดอื่นๆ

                    </div>
                    <hr>
                    <div class="font-normal text-md mt-2">
                        <?= $rowSe["d"] ?>
                    </div>
                </div>
            </div>


            <div class="px-2 lg:col-span-1 xl:col-span-2  mt-4">

                <div
                    class="top-0 sticky   rounded-lg border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-lg sm:p-6">
                    <div class="mx-10 md:mx-2">
                        <div class="flex items-center gap-4">
                            <img class="w-16 h-16 rounded-full" src="<?= $objShow->nameImage($rowSe["uid"]) ?>" alt="">
                            <div class="text-lg font-medium dark:text-white">
                                <div>คุณ <?php echo $objShow->name($rowSe["uid"])  ?></div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">เป็นสมาชิกเมื่อ
                                    <?php echo $objShow->nameFirstDate($rowSe["uid"])  ?></div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="text-lg font-medium ">
                            ติดต่อ

                        </div>
                        <div class="mx-auto mt-2">
                            <button data-modal-target="progress-modal" data-modal-toggle="progress-modal"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-full dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                <i class="bi bi-telephone-outbound"></i> กดดู
                                <?php echo $objShow->Tel($rowSe["uid"])  ?>
                            </button>
                        </div>
                        <div class="text-sm font-light text-center mt-2"> <i class="bi bi-exclamation-circle"></i>
                            <a href="">แจ้งประกาศไม่เหมาะสม</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div>








    <div id="crypto-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Connect wallet
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crypto-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4 md:p-5">
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Connect with one of our available
                        wallet providers or create a new one.</p>
                    <div class="my-4 space-y-3">

                        <div class="share-list">
                            <a class="line" onclick="return line_click()" target="_blank">
                                <img src="https://img.icons8.com/?size=100&id=21746&format=png&color=000000">
                            </a>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Main modal -->
    <div id="progress-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="progress-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5">
                    <div class="text-center">
                        <img class="w-16 h-16 rounded-full mx-auto  "
                            src="../th/img/<?= $objShow->nameImage($rowSe["uid"]) ?>" alt="">
                        <div class="text-lg font-medium dark:text-white">
                            <div>คุณ <?php echo $objShow->name($rowSe["uid"])  ?></div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">เป็นสมาชิกเมื่อ
                                <?php echo $objShow->nameFirstDate($rowSe["uid"])  ?></div>
                        </div>
                        <div class="mx-auto mt-5">
                            <button
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-full dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                <i class="bi bi-telephone-outbound"></i>
                                <?php echo $objShow->telFull($rowSe["uid"])  ?>
                            </button>
                        </div>
                        <div class=""><img src="../storage/images/telShow.png" alt="" srcset=""></div>
                    </div>
                    <!-- Modal footer -->
                    <button data-modal-hide="progress-modal" type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full">ปิด</button>
                </div>
            </div>
        </div>
    </div>







    <?php include '../components/layoutFooter.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../slick/slick/slick.min.js"></script>
    <script src="../components/summernote/summernote-bs5.min.js"></script>
    <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer">
    </script>


    <script>
        $(document).ready(function() {
            $('.single-item').slick();
            $(".gallery a").attr("data-fancybox", "mygallery");
            // assign captions and title from alt-attributes of images:
            $(".gallery a").each(function() {
                $(this).attr("data-caption", $(this).find("img").attr("alt"));
                $(this).attr("title", $(this).find("img").attr("alt"));
            });
            // start fancybox:
            $(".gallery a").fancybox();



            // load more content
        });
    </script>

</body>

</html>