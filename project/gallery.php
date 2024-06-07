<?php include_once("./template/header.php") ?>
<?php include_once("./template/sidebar.php") ?>


<section class=" bg-gray-50 p-5 mt-5 rounded-md ">
    <ol class="flex items-center whitespace-nowrap ">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="./index.php">
                Home
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Gallery
        </li>
    </ol>

    <form method="post" action="./gallery-process.php" enctype="multipart/form-data" class="max-w-sm">
        <div class=" my-5"> <label for="upload" class="sr-only">Choose file</label>
            <input type="file" name="upload[]" multiple id="file-input" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-3 file:px-4
            dark:file:bg-neutral-700 dark:file:text-neutral-400">
        </div>
        <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Upload
        </button>
    </form>
    <hr class=" my-4">

</section>

<section class=" mt-5">
    <?php
    $photos = array_filter(scandir("photos"), fn ($dot) => $dot !== "." && $dot !== "..");
    ?>
    <div class=" grid grid-cols-3 gap-5">
        <?php foreach ($photos as $photo) : ?>
            <div class=" relative inline-block group overflow-hidden">
                <img src="photos/<?= $photo ?>" alt="<?= $photo ?>">
                <a href="./gallery-delete.php?file=<?= $photo ?>" type="button" class="flex absolute top-2 transform duration-300 group-hover:translate-x-0 translate-x-20 right-2 flex-shrink-0 justify-center items-center gap-2 size-[25px] text-sm font-semibold rounded-md border bg-transparent bg-red-600 border-red-600  disabled:opacity-50 disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 flex-shrink-0  text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
            </div>
        <?php endforeach; ?>




    </div>
</section>


<?php include_once("./template/footer.php") ?>