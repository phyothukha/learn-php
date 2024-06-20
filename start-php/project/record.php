<?php include("./template/header.php") ?>
<?php include("./template/sidebar.php") ?>

<section class=" bg-gray-50 p-5 rounded-md mt-5">

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
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="index.php">
                Area Calculator
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>


        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Record List
        </li>
    </ol>
    <hr class=" my-3  border-gray-200">
    <?php

    $fileName = "saveRecord.txt";

    if (file_exists($fileName)) {
        touch($fileName);
    }
    $fileStream = fopen($fileName, "r");

    while (!feof($fileStream)) :
        $content = fgets($fileStream);
        if (empty($content)) continue;
    ?>
        <p class=" p-3 bg-white mb-2"><?= $content; ?></p>
    <?php endwhile; ?>


    <a type="button" href="index.php" class="py-3 justify-center w-full px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Calculate again
    </a>

</section>

<?php include("./template/footer.php") ?>