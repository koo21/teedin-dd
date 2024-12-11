<?php
include 'myClass.php';
$obj = new MyClass();
$searchDistrict = $_POST["distrData"];
$searchDistrictEx = explode("/", $searchDistrict);
$poviSearch = $searchDistrictEx[0];
$ampSearch = $searchDistrictEx[1];
?>
<div class="flex flex-col-1 items-top ">
    <select id="countries" name="district"
        class="w-40 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 district">
        <option value="0">-- ตำบล --</option>
        <?php echo $obj->district($poviSearch, $ampSearch); ?>
    </select>
</div>