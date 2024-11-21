<?php
session_start();
include 'myClass.php';
$obj = new MyClass();

if ($_POST["povData"] == "") {
    $povDataId = $_SESSION["amp"];
    $povDataNameId = $_SESSION["ampName"];
}

if (!$_POST["povData"] == "") {
    $povData = $_POST["povData"];
    $povDataId = $_SESSION["amp"];
    $povDataNameId = $_SESSION["ampName"];
}


?>

<label for="amphur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* เลือกเขต/อำเภอ
</label>
<select id="countries" name="amphur"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 amphur">
    <option value="<?= $povDataId ?>"><?= $povDataNameId ?></option>
    <option value="0">-- เลือกเขต/อำเภอ --</option>
    <?php echo $obj->amphurProfile($povData); ?>
</select>


<div class="searchDistrict mt-3"></div>

<script>
    $(document).ready(function() {

        $(".searchDistrict").load('searchDistrictProfile.php');

        $('.amphur').mouseover(function() {
            let distrData = $(this).val();
            let url = 'searchDistrictProfile.php';
            $.post(url, {
                distrData: distrData
            }, function(data) {
                $(".searchDistrict").html(data);
            });
        })

        $('.amphur').change(function() {
            let distrData = $(this).val();
            let url = 'searchDistrictProfile.php';
            $.post(url, {
                distrData: distrData
            }, function(data) {
                $(".searchDistrict").html(data);
            });
        })

    });
</script>