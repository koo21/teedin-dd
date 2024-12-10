<?php


if ($_GET["b"] == "pf") {
    $bk1 = 'bg-gray-100';
}
if ($_GET["b"] == "po") {
    $bk2 = 'bg-gray-100';
}
if ($_GET["b"] == "p3") {
    $bk3 = 'bg-gray-100';
}
?>
<ul
    class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
    <li class="me-2">
        <a href="post.php?b=po"
            class="inline-block p-4 <?= $bk2 ?>   p-4 text-gray-600 hover:bg-gray-50 rounded-t-lg  dark:bg-gray-800 dark:text-blue-500"><i
                class="bi bi-1-square"></i> ลงประกาศ</a>
    </li>
    <li class="me-2">
        <a href="profile.php?b=pf"
            class="inline-block <?= $bk1 ?> p-4 text-gray-600 hover:bg-gray-50 rounded-t-lg  dark:bg-gray-800 dark:text-blue-500"><i
                class="bi bi-2-square"></i> ข้อมูลสมาชิก</a>
    </li>
    <li class="me-2">
        <a href="listDetailPost.php?b=p3"
            class="inline-block <?= $bk3 ?> p-4 text-gray-600 hover:bg-gray-50 rounded-t-lg  dark:bg-gray-800 dark:text-blue-500"><i
                class="bi bi-3-square"></i> ประกาศของคุณ</a>
    </li>

</ul>