<?php require_once("./template/header.php") ?>
<?php require_once("./template/sidebar.php") ?>

<section class=" bg-gray-50 p-5 mt-5 rounded-md ">
    <ol class="flex items-center whitespace-nowrap ">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                Home
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="batch-list.php">
                Manage Batch
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Update Batch
        </li>
    </ol>
    <hr class=" my-3  border-gray-200">
    <?php
    $id = $_GET['row_id'];
    $sql = "SELECT * FROM batches where id= $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    ?>


    <form action="./batch-update.php" method="post">
        <h1 class=" text-xl font-medium mb-5">Update Batches</h1>
        <div class=" flex flex-col gap-5 w-full items-end ">
            <input type="hidden" name="row_id" id="row_id" value="<?= $row['id'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Product Name">
            <div class=" w-full">
                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Batch Name</label>
                <input type="text" name="name" value="<?= $row['name'] ?>" id="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Batch Name">
            </div>
            <div class=" w-full">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Select Course</label>
                <select data-hs-select='{
                "placeholder": "Select Rating...",
                "toggleTag": "<button type=\"button\"></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400",
                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"flex-shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' name="course_id" class="hidden">
                    <?php
                    $sql = "SELECT * FROM courses";
                    $query = mysqli_query($conn, $sql);
                    while ($course = mysqli_fetch_assoc($query)) :
                    ?>
                        <option <?= $course['id'] === $row['course_id'] ? "selected" : ""  ?> value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class=" w-full">
                <label for="start_date" class="block text-sm font-medium mb-2 dark:text-white">Start Date</label>
                <input type="date" value="<?= $row['start_date'] ?>" name="start_date" id="start_date" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Pick Date">
            </div>
            <div class=" w-full">
                <label for="student_limit" class="block text-sm font-medium mb-2 dark:text-white">Student Limit</label>
                <input type="number" name="student_limit" value="<?= $row['student_limit'] ?>" id="student_limit" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter student limit">
            </div>

            <div class=" flex gap-5 w-full">
                <div class=" w-full">
                    <label for="stock" class="block text-sm font-medium mb-2 dark:text-white">Start Time</label>
                    <input type="time" name="start_time" value="<?= $row['start_time'] ?>" id="stock" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Start Time">
                </div>
                <div class=" w-full">
                    <label for="stock" class="block text-sm font-medium mb-2 dark:text-white">End Time</label>
                    <input type="time" name="end_time" id="stock" value="<?= $row['end_time'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter End Time">
                </div>
            </div>


            <div class=" w-full">
                <input type="checkbox" value="1" <?= $row['is_register_open'] == 1 ? 'checked' : "" ?> name="is_register_open" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checked-checkbox">
                <label for="hs-checked-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Register</label>
            </div>

            <button type="submit" name="calculate" class=" max-w-sm px-5 py-3 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Update Batch
            </button>
        </div>
    </form>
</section>


<?php require_once('./template/footer.php') ?>