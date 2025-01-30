<?php
session_start();
include '../sessionCheck/sessionAdmin.php';
include '../config/connect.php';
include 'myClass.php';
$obj = new MyClassAdmin;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teedin DD</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
        <div class="p-4 mt-14 ">


            <div
                class="w-full p-4  bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700 mb-3">


                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php
                    $seBox = $con->prepare("SELECT * FROM property");
                    $seBox->execute();
                    while ($rBox = $seBox->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                        <li class="px-3 py-3 transition hover:bg-indigo-100 hover:cursor-pointer">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse ">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">

                                        <?php echo  $obj->fname($rBox["uid"]) ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        <?php echo  $obj->mail($rBox["uid"]) ?>
                                    </p>
                                </div>

                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    $320
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>

                </ul>


            </div>





        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../components/summernote/summernote-bs5.css" rel="stylesheet">
    <script src="../components/summernote/summernote-bs5.js"></script>
</body>

</html>