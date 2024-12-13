<?php

$year = date('Y');
$month = date('m');
$fodderYear = '../th/img/prop/' . $year;
$fodderMonth = '../th/img/prop/' . $year . '/' . $month;
if (!is_dir($fodderYear)) {
    mkdir($fodderYear);
    if (!is_dir($fodderMonth)) {
        mkdir($fodderMonth);
    }
    //echo "Directory $fodderYear created successfully.";
} else {
    if (!is_dir($fodderMonth)) {
        mkdir($fodderMonth);
    }
    //echo "Directory $fodderYear already exists.";
}

$userYear = '../th/img/user/' . $year;
$userMonth = '../th/img/user/' . $year . '/' . $month;
if (!is_dir($userYear)) {
    mkdir($userYear);
    if (!is_dir($userMonth)) {
        mkdir($userMonth);
    }
    //echo "Directory $userYear created successfully.";
} else {
    if (!is_dir($userMonth)) {
        mkdir($userMonth);
    }
    //echo "Directory $userYear already exists.";
}
