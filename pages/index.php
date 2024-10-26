<?php
include '../components/layoutHead.php';
include '../banner/banner.php';
?>

<div class="container-fluid bkImg">
    <div class="container">
        <div class="text-3xl text-white text-center mb-2">ขายที่ดิน บ้านมือสอง คอนโด ลงประกาศฟรี</div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-500 blur-none py-5 px-5 rounded-xl">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </div>
                        <input type="text" id="email-address-icon"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ค้นหาเขต, อำเภอ, เมือง" data-modal-target="search-modal"
                            data-modal-toggle="search-modal">
                    </div>
                    </form>

                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>


<?php include_once 'modelSearch.php'; ?>



<?php
include '../components/layoutFooter.php';
?>