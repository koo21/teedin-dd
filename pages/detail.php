<?php
//include '../fuc/checkName.php';
//include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include_once 'myClass.php';
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
    <meta property="og:title" content="<?= $rowSe["ti"] ?>">
    <meta property="og:description" content="<?= $rowSe["d"] ?>">
    <meta name="keywords" content="">
    <!-- <meta name="description" content=""> -->
    <meta property="og:image" content="<?= $img2 ?>" />
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

    <div class="container mt-5 mx-10">
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
                            <img class="w-16 h-16 rounded-full"
                                src="../th/img/<?= $objShow->nameImage($rowSe["uid"]) ?>" alt="">
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


        <!-- สินค้าใกล้เคียง -->

        <h2 class="text-xl font-semibold lg:ms-64 mt-4 mb-2 px-2">ที่ดินใกล้เคียง</h2>

        <div class="grid grid-cols-2 lg:grid-cols-4 lg:ms-64 px-2 gap-4">

            <?php


            $se = $con->prepare("SELECT * FROM property");
            $se->execute();
            while ($row = $se->fetch(PDO::FETCH_ASSOC)) {

                //echo $renDom = uniqid($row["pd"]);

                $crEx = explode("-", $row["cr"]);
                $part = $crEx[0] . "/" . $crEx[1] . "/";

                if ($row["se"] == "1" and $row["re"] == "0" and $row["do"] == "0") {
                    $status = "ขาย";
                    $price = number_format($row["pt"]);
                } elseif ($row["se"] == "0" and $row["re"] == "1" and $row["do"] == "0") {
                    $status = "ให้เช่า";
                    $price = number_format($row["prt"]);
                } elseif ($row["se"] == "1" and $row["re"] == "1" and $row["do"] == "0") {
                    $status = "ขายหรือให้เช่า";
                } elseif ($row["se"] == "0" and $row["re"] == "0" and $row["do"] == "1") {
                    $status = "ขายดาวน์";
                } elseif ($row["se"] == "1" and $row["re"] == "0" and $row["do"] == "1") {
                    $status = "ขายหรือขายดาวน์";
                } elseif ($row["se"] == "0" and $row["re"] == "1" and $row["do"] == "1") {
                    $status = "ให้เช่าหรือขายดาวน์";
                    $price = number_format($row["prt"]);
                } elseif ($row["se"] == "1" and $row["re"] == "1" and $row["do"] == "1") {
                    $status = "ขายหรือให้เช่าหรือขายดาวน์";
                }

            ?>
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <a href="detail.php?id=<?= $row["pd"] ?>&p=<?= $part ?>">
                        <img class="rounded-t-lg h-48 lg:h-64  w-full object-cover"
                            src="../th/img/prop/<?= $part . $objShow->showImg($row["pd"])  ?>" alt="" />

                        <div class="p-3 flex flex-col space-y-10">
                            <div class="xl:h-48 lg:h-48  h-28 ">
                                <div class="mb-2">


                                    <div class=" text-green-700 font-sm font-normal ">
                                        <?= $status ?>
                                    </div>

                                    <h5
                                        class=" text-lg font-normal tracking-tight text-gray-900 dark:text-white line-clamp-2 lg:line-clamp-3">
                                        <?= $row["ti"] ?></h5>
                                </div>


                                <div class="mb-3 text-gray-400 font-sm ">
                                    <div class="flex justify-start items-center justify-items-center">
                                        <svg fill="#a9a7a7" height="15px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 128 85.2" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <circle cx="28.9" cy="23.2" r="11.3"></circle>
                                                            <path d="M28.9,23.2"></path>
                                                        </g>
                                                        <g>
                                                            <path d="M53.4,20h45.4c6.7,0,10.6,4.3,10.6,10v16.4H53.4V20z">
                                                            </path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="M41,25.9v9.8H23.6c-8.4,0-8.4,10.9,0,10.9h22.9c3.3,0,5.4-2.7,5.4-5.7v-15C51.9,17.7,41,17.7,41,25.9z">
                                                            </path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="M15.3,10.6c0-8.9-12.4-8.9-12.4,0v71.6h12.7V63.7H112v18.4h12.4V26.7c0-9.4-12.5-9.4-12.5,0v22.1H15.3V10.6z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <p class="mx-1"><?= $row["ba"]; ?></p>

                                        <svg fill="#a9a7a7" height="15px" version="1.1" id="Capa_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 485.694 485.694" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path id="XMLID_191_"
                                                    d="M475.864,268.527c0.187-1.949-0.463-3.886-1.773-5.335c-1.326-1.441-3.191-2.266-5.148-2.266H92.756V88.422 c0-31.34,25.503-56.844,56.851-56.844c23.329,0,43.374,14.155,52.117,34.655c-28.927,10.756-51.268,42.311-52.75,68.786 c-0.046,0.717,0.217,1.418,0.709,1.942c0.494,0.524,1.188,0.818,1.898,0.818h141.304c0.709,0,1.402-0.302,1.897-0.818 c0.492-0.524,0.754-1.226,0.709-1.942c-1.619-28.941-28.172-63.898-61.014-71.169C223.805,27.021,189.835,0,149.607,0 c-48.756,0-88.43,39.666-88.43,88.422v172.505H16.753c-1.958,0-3.824,0.824-5.135,2.273c-1.326,1.441-1.974,3.386-1.789,5.327 c5.027,53.035,41.648,114.451,95.816,156.399c3.393,2.621,7.093,4.696,10.686,6.946l-13.894,12.561 c-9.698,8.772-10.454,23.745-1.695,33.451c4.672,5.181,11.117,7.81,17.578,7.81c5.675,0,11.35-2.02,15.883-6.106l32.579-29.427 c5.568,0.732,11.165,1.38,16.838,1.38h118.453c5.674,0,11.271-0.648,16.853-1.395l32.596,29.442 c4.52,4.095,10.208,6.106,15.867,6.106c6.461,0,12.906-2.637,17.578-7.81c8.773-9.706,8.002-24.686-1.712-33.451l-13.909-12.561 c3.609-2.25,7.31-4.325,10.703-6.946C434.217,382.978,470.839,321.563,475.864,268.527z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="mx-1"><?= $row["be"];  ?></p>

                                        <svg fill="#a9a7a7" height="15px" version="1.2" baseProfile="tiny" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="-351 153 256 256" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M-223.4,158.8l-120.5,60.7v183.1h9.6V225.3l110.9-55.6l111,55.8v177.1h9.4V219.5L-223.4,158.8z M-149.7,303.5l-14.8-38.2 c-2.7-7.2-8.8-13.5-20.3-13.5h-20.9h-35.7h-21.1c-11.3,0-17.3,6.2-20.3,13.5l-14.8,38.2c-5.8,0.8-16.2,7.6-16.2,20.6v48.6h14.4v15.6 c0,19.1,27.1,19,27.1,0v-15.6h48.8h48.8v15.6c0,19,27.1,19.1,27.1,0v-15.6h14.4v-48.6C-133.5,311.1-143.8,304.1-149.7,303.5z M-285.5,343.4c-6.8,0-12.5-5.8-12.5-12.9c0-7,5.6-12.9,12.5-12.9c6.8,0,12.5,5.8,12.5,12.9C-273,337.6-278.5,343.4-285.5,343.4z M-223.7,303.1h-58.5l11.1-30.1c1.3-4.3,3.5-7.2,8.4-7.4h39h39c4.9,0,7,3.1,8.4,7.4l11.1,30.1H-223.7z M-161.7,343.4 c-6.8,0-12.5-5.8-12.5-12.9c0-7,5.6-12.9,12.5-12.9s12.5,5.8,12.5,12.9C-149.2,337.6-154.9,343.4-161.7,343.4z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p class="mx-1"><?= $row["ca"];  ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 ">

                                <h2 class="text-xl lg:text-2xl tracking-tight text-amber-600 dark:text-white fontNumber">
                                    ฿ <?= $price ?> </h2>

                                <div class="flex mt-2">

                                    <svg height="20px" width="20px" version="1.1" id="_x32_"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 512 512" xml:space="preserve" fill="#a9a7a7">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">

                                            <g>
                                                <path class="st0"
                                                    d="M256,0C160.798,0,83.644,77.155,83.644,172.356c0,97.162,48.158,117.862,101.386,182.495 C248.696,432.161,256,512,256,512s7.304-79.839,70.97-157.148c53.228-64.634,101.386-85.334,101.386-182.495 C428.356,77.155,351.202,0,256,0z M256,231.921c-32.897,0-59.564-26.668-59.564-59.564s26.668-59.564,59.564-59.564 c32.896,0,59.564,26.668,59.564,59.564S288.896,231.921,256,231.921z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="mx-1 text-gray-400"><?= $row["pn"];  ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
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








    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../slick/slick/slick.min.js"></script>
    <script src="../components/summernote/summernote-bs5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        var pageLink = 'http://madu-web.com/pages/detail.php?id=<?= $_GET["id"] ?>&p=<?= $_GET["p"] ?>';

        function fbs_click() {
            window.open(`http://www.facebook.com/sharer.php?u=${pageLink}`, 'share',
                'toolbar=0,status=0,width=626,height=436');
            return false;
        }

        function line_click() {
            window.open(`https://social-plugins.line.me/lineit/share?url=${pageLink}`, 'sharer',
                'toolbar=0,status=0,width=626,height=436');
            return false;
        }
    </script>

</body>

</html>