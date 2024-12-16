<?php
include '../fuc/checkName.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
include '../config/connect.php';
include 'myClass.php';
$objShow = new MyClass();
$obj = new MyClass();
?>
<link rel="stylesheet" href="../slick/slick/slick.css">
<link rel="stylesheet" href="../slick/slick/slick-theme.css">
<style>
.slick-arrow {
    z-index: 1;
    width: 40px;
    height: 40px;
}

.slick-arrow:before {
    font-size: 30px;
}

.slick-next {
    right: 0;
}

.slick-prev {
    left: 0;
}

.btn-wrap {
    text-align: center;
    width: 100%;
}

button {
    background-color: #ddd;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 10px;
    font-size: 18px;
    font-weight: 600;
    transition: all 0.5s;
}

button.slick-disabled {
    opacity: 0.6;
}
</style>

<div class="container-fit w-auto mx-auto mt-10 mb-5">
    <div class="one-time">
        <div class=""><img src="../storage/images/bannerHome-1.jpg" alt="" srcset=""></div>
        <div class=""><img src="../storage/images/bannerHome-4.jpg" alt="" srcset=""></div>
    </div>

</div>
<form action="searchData.php" method="post">
    <div class="container grid gap-x-8 gap-y-4  md:grid md:grid-flow-col md:auto-cols-max md:gap-4 ">

        <div class="mt-2 font-medium  justify-end w-20"><i class="bi bi-search"></i> ค้นหา
        </div>
        <div class="">
            <select id="countries"
                class="h-10 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">
                <option selected>-- จังหวัด --</option>
                <?= $obj->province(); ?>
            </select>
        </div>

        <div class="showAmphur "></div>


        <div class="mt-[-11px]"><button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-[11px] me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ค้นหา</button>
        </div>
    </div>



</form>
</div>


<div class="container mb-5 mt-5">

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

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
        <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <a href="detail.php?id=<?= $row["pd"] ?>&p=<?= $part ?>">
                <img class="rounded-t-lg h-32 lg:h-48 w-full object-cover"
                    src="../th/img/prop/<?= $part . $objShow->showImg($row["pd"])  ?>" alt="" />

                <div class="p-3 flex flex-col space-y-10">
                    <div class="h-16 lg:h-32">
                        <div class="mb-2">


                            <div class="mb-2">
                                <span
                                    class="bg-green-100 text-green-800 text-xs md:text-sm font-light me-2 px-1.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    <?= $status ?></span>

                            </div>

                            <h5
                                class="text-sm md:text-lg font-normal tracking-tight text-gray-900 dark:text-white line-clamp-2 lg:line-clamp-3">
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
                    <div class="mt-12 mb-10 ">

                        <h2 class="text-xl lg:text-2xl tracking-tight text-amber-600 dark:text-white fontNumber">
                            ฿ <?= $price ?> </h2>

                        <div class="flex mt-2">

                            <svg height="20px" width="20px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                fill="#a9a7a7">
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
                            <p class="mx-1 text-sm md:text-md text-gray-400"><?= $row["pn"];  ?></p>
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

<div class="container mx-auto">
    <div
        class="bg-[url('../storage/images/bannerHome-2.jpg')] bg-no-repeat bg-cover bg-center min-h-40 rounded-lg md:min-h-48 lg:min-h-60">
        <div class="grid grid-cols-3 gap-2 justify-between p-2 md:p-6">
            <div class="md:w-32 lg:w-46">
                <img src="../storage/images/bannerHome-3.png" alt="" srcset="">
            </div>
            <div class="col-span-2 text-center relative h-40 lg:w-3/4 lg:ms-20 lg:mt-16">
                <div
                    class="absolute bottom-0 right-0 p-2 backdrop-saturate-125 bg-white/30 rounded-xl md:text-xl lg:text-3xl  ">
                    ปล่อยขาย
                    ปล่อยเช่า
                    แต่ไม่มีลูกค้า ให้ <span class="font-bold text-amber-800 text-2xl lg:text-4xl">ที่ดินดีดี</span>
                    ช่วย
                    ให้คำปรึกษา ช่วยขาย ปล่อยเช่าได้ไว ฟรีไม่มีค่าใช้จ่าย</div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../slick/slick/slick.min.js"></script>
<?php include '../components/layoutFooter.php'; ?>

<script>
$(document).ready(function() {

    $(".showAmphur").load('searchAmphurIndex.php');

    $('.province').change(function() {
        let povData = $(this).val();
        let url = 'searchAmphurIndex.php';

        $.post(url, {
            povData: povData
        }, function(data) {
            $(".showAmphur").html(data);
        });
    })
    $('.one-time').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 700,
        slidesToShow: 1,
        adaptiveHeight: true,
        arrows: true
    });
    $(".prev-btn").click(function() {
        $(".slick-list").slick("slickPrev");
    });

    $(".next-btn").click(function() {
        $(".slick-list").slick("slickNext");
    });
    $(".prev-btn").addClass("slick-disabled");
    $(".slick-list").on("afterChange", function() {
        if ($(".slick-prev").hasClass("slick-disabled")) {
            $(".prev-btn").addClass("slick-disabled");
        } else {
            $(".prev-btn").removeClass("slick-disabled");
        }
        if ($(".slick-next").hasClass("slick-disabled")) {
            $(".next-btn").addClass("slick-disabled");
        } else {
            $(".next-btn").removeClass("slick-disabled");
        }
    });
});
</script>
<?php
include_once 'modelSearch.php';
include '../components/layoutFooter.php';
?>