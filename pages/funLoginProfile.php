<?php
session_start();
$se = $con->prepare("SELECT * FROM users WHERE uid = ? ");
$se->execute([$_SESSION["idUser"]]);
$r = $se->fetch(PDO::FETCH_ASSOC);

if (!empty($r["pb"])) {
    $imgUser = '../th/img/' . $r["pb"] . '';
} else {
    $imgUser = '../th/img/user/noimage.jpg';
}

?>

<div class="flex justify-end items-center">สวัสดีคุณ :<img class="w-10 h-10 me-1 ms-2 rounded-full"
        src="<?= $imgUser ?>" alt="<?= $_SESSION["nameUser"] ?>">
    <?= $_SESSION["nameUser"] ?> | <a href="logout.php" type="button"
        class="ms-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
            class="bi bi-door-closed"></i> ออกจากระบบ</a></div>