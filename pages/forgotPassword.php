<?php
include '../fuc/checkName.php';
include '../components/layoutHead.php';
include '../banner/banner.php';
?>

<div class="container">

    <div class="mt-5">

        <div
            class="max-w-xl mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-medium tracking-tight text-gray-900 dark:text-white">ลืมรหัสผ่าน</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400"></p>


            <form class="mt-3" method="post" action="forgotPassword-check.php">
                <div class="mb-3">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมลล์</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 forgot">บันทึก
                </button>
            </form>

        </div>

    </div>

</div>


<?php include_once 'modelSearch.php'; ?>

<script>
    $(document).ready(function() {
        $('.forgot').click(function() {
            if ($("#email").val() == "") {
                $("#email").focus();
                Swal.fire({
                    title: "ลืมรหัสผ่าน",
                    text: "กรุณากรอกอีเมล์",
                    icon: "warning"
                });

                return false;
            }
        })
    })
</script>

<?php
include '../components/layoutFooter.php';
?>