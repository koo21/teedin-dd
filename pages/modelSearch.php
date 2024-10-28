<?php
include 'myClass.php';
$obj = new MyClass();
?>

<!-- Main modal -->
<div id="search-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    <i class="bi bi-search"></i> ค้นหาข้อมูล
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="search-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="searchCity.php" method="post">
                    <div>
                        <label for="province"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">จังหวัด</label>
                        <select id="countries" name="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 province">
                            <option value="0">-- ค้นหาจังหวัด --</option>
                            <?= $obj->province(); ?>
                        </select>
                    </div>
                    <div>
                        <div class="showAmphur"></div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                            class="bi bi-search"></i> ค้นหา</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $(".showAmphur").load('searchAmphur.php');

    $('.province').change(function() {
        let povData = $(this).val();
        let url = 'searchAmphur.php';

        $.post(url, {
            povData: povData
        }, function(data) {
            $(".showAmphur").html(data);
        });
    })

});
</script>