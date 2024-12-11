<?php
include 'myClass.php';
$obj = new MyClass();
$searchDistrict = $_POST["distrData"];
$searchDistrictEx = explode("/", $searchDistrict);
$poviSearch = $searchDistrictEx[0];
$ampSearch = $searchDistrictEx[1];
?>
<div class="flex gap-3">
    <select id="countries" name="district"
        class="h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 district">
        <option value="0">-- ตำบล --</option>
        <?php echo $obj->district($poviSearch, $ampSearch); ?>
    </select>


    <div class=""><button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-[11px] me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ค้นหา</button>
    </div>
</div>