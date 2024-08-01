<?php template("header"); ?>


<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Our Batch</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Currently opening batch list is here</p>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">#</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">name</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">course</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Start Date</th>
                        <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($batches as $batch) : ?>
                        <tr>
                            <td class="px-4 py-3"><?= $batch["id"]; ?></td>
                            <td class="px-4 py-3"><?= $batch['name']; ?></td>
                            <td class="px-4 py-3"><?= $batch['course_id']; ?></td>
                            <td class="px-4 py-3 text-lg text-gray-900"><?= $batch["start_date"] ?></td>
                            <td class="w-10 text-center">
                                <a href="<?= url("batch-delete", ["id" => $batch['id']]) ?>" class="flex ml-auto text-white bg-red-500 border-0 py-0 px-2  focus:outline-none hover:bg-indigo-600 rounded">DELETE</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>
</section>
<?php template("footer") ?>