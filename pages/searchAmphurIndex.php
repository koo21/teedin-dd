<?php
include 'myClass.php';
$obj = new MyClass();
$povData = $_POST["povData"];
?>
<div class="flex flex-col-1 items-top gap-4">
    <select id="countries" name="amphur"
        class="w-44 h-11 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 amphur">
        <option value="0">-- เลือกเขต/อำเภอ --</option>
        <?php echo $obj->amphur($povData); ?>
    </select>


    <div class=" searchDistrict"></div>

</div>


<script>
$(document).ready(function() {

    $(".searchDistrict").load('searchDistrictIndex.php');

    $('.amphur').change(function() {
        let distrData = $(this).val();
        let url = 'searchDistrictIndex.php';



        $.post(url, {
            distrData: distrData
        }, function(data) {
            $(".searchDistrict").html(data);
        });
    })

});
</script>