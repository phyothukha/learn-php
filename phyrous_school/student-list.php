<?php require_once('./template/header.php') ?>
<?php require_once('./template/sidebar.php') ?>
<!--- Pagination Logic 

recordPerpage
totalrecord
totalPage
--->

<?php
$sql = "SELECT *,students.id as student_id FROM students  LEFT JOIN nationality  ON nationality.id= students.national_id LEFT JOIN gender ON gender.id=students.gender_id ";

$countSql = "SELECT count(id) as total_student FROM students";

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $sql .= " WHERE name LIKE '%$q%' ";
    $countSql .= " WHERE name LIKE '%$q%' ";
}

if (isset($_GET['sort_by']) && isset($_GET['order'])) {
    $sortBy = $_GET['sort_by'];
    $order = $_GET['order'];
    $sql .= " ORDER BY $sortBy $order";
}

$recordPerPage = 5;
$countQuery = mysqli_query($conn, $countSql);

$countobj = mysqli_fetch_assoc($countQuery);
$totalRecord = $countobj['total_student'];
$totalPage = ceil($totalRecord / $recordPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $recordPerPage;
$sql .= " LIMIT $offset,$recordPerPage";
$query = mysqli_query($conn, $sql);

$start = $currentPage > 3 ? $currentPage - 3 : 1;
$end = $currentPage + 3 < $totalPage ? $currentPage + 3 : $totalPage;
?>
<section class=" bg-gray-50 overflow-scroll w-fit p-5 m-5 rounded-md ">
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
            Manage Students
        </li>
    </ol>
    <hr class=" my-3  border-gray-200">
    <div class=" justify-end w-full flex gap-5">
        <form action="./student-list.php" method="get">
            <div>
                <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Label</label>
                <div class="flex rounded-lg shadow-sm">
                    <div class=" relative ">
                        <input placeholder="Search Students" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" name="q" type="text" id="hs-trailing-button-add-on-with-icon" name="hs-trailing-button-add-on-with-icon" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <?php if (isset($_GET['q'])) : ?>
                            <a href="./student-list.php" class=" absolute right-2 top-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <a href="./student-create.php" type="button" name="calculate" class=" max-w-sm px-3 py-2 leading-6 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Create Student
        </a>
    </div>
    <div class=" min-w-full overflow-x-auto inline-block align-middle">
        <div class=" flex justify-between items-center">
            <h1 class=" text-xl font-medium my-5">Students List</h1>
            <h1>
                Search result (<?= $totalRecord; ?>)
                <?php if (isset($_GET['q'])) : ?>
                    By name=<?= $_GET['q'] ?>
                <?php endif; ?>
            </h1>
        </div>
        <div class="overflow-hidden">
            <table class="">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">#</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500 flex  items-center gap-2">
                            Name
                            <div class=" flex flex-col">
                                <a href="./student-list.php?sort_by=name&order=asc" class=" hover:bg-gray-300 p-0.5 transform transition duration-500 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-3">
                                        <path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="./student-list.php?sort_by=name&order=desc" class=" hover:bg-gray-300 p-0.5 transform transition duration-500 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-3">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Birth Date</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase inline-block w-40 dark:text-neutral-500">Pocket Money</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Created</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td class="px-6  py-4 whitespace-nowrap text-sm leading-tight font-medium text-gray-800 dark:text-neutral-200"><?= $row['student_id'] ?></td>
                            <td class="px-6  py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 space-y-2"><?= $row['name'] ?>
                                <br>
                                <span class=" bg-purple-200 text-purple-600 px-3 font-normal text-xs py-1 rounded-full inline-block"> <?= ($row['national']) ?></span>
                                <span class=" bg-green-200 text-green-600 font-normal text-xs px-3 py-1 rounded-full inline-block"> <?= ($row['type']) ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= date('d M, Y', strtotime($row['date_of_birth'])) ?></td>
                            <td class="px-6 py-4 inline-block w-40 leading-10  whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 text-end">
                                <?= ($row['pocket_money']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 text-end">
                                <?= date('d M, Y', strtotime($row['created_at'])) ?>
                                <br>
                                <span class=" text-gray-500 font-medium text-xs"> <?= date('h:m A', strtotime($row['created_at'])) ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 text-end">
                                <div class="flex flex-col sm:inline-flex sm:flex-row rounded-lg shadow-sm">
                                    <a href="./student-edit.php?row_id=<?= $row['student_id'] ?>" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 stroke-green-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a onclick="return confirm('are u sure u want to delete this row?')" href="./student-edit.php?row_id<?= $row['student_id'] ?>" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 stroke-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>

    </div>


    <!-- Pagination -->
    <nav class="flex items-center gap-x-1">
        <a href="./student-list.php?page=<?= $currentPage - 1 > 0 ?  $currentPage - 1 : 1 ?><?= isset($_GET['q']) ? '&q=' . $_GET['q'] : '' ?>" class="min-h-[38px] 
         <?= $currentPage <= 1 ?  "bg-gray-200" : "" ?>
         min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
            <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
            <span aria-hidden="true" class="sr-only">Previous</span>
        </a>
        <div class="flex items-center gap-x-1">
            <?php for ($i = $start; $i <= $end; $i++) : ?>
                <a href="./student-list.php?page=<?= $i ?><?= isset($_GET['q']) ? '&q=' . $_GET['q'] : '' ?><?= (isset($_GET['sort_by']) && isset($_GET['order'])) ? '&sort_by=' . $_GET['sort_by'] . "&order=" . $_GET['order'] : '' ?>
                " class="min-h-[38px] min-w-[38px] flex justify-center items-center
                <?= $currentPage == $i ? 'border border-gray-200' : '' ?>
                 text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:focus:bg-white/10" aria-current="page">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
        <a href="./student-list.php?page=<?= $currentPage < $totalPage ? $currentPage + 1 : $totalPage ?><?= isset($_GET['q']) ? '&q=' . $_GET['q'] : '' ?><?= (isset($_GET['sort_by']) && isset($_GET['order'])) ? '&sort_by=' . $_GET['sort_by'] . "&order=" . $_GET['order'] : '' ?>
        " class="min-h-[38px]
        <?= $currentPage >= $totalPage ?  "bg-gray-200" : "" ?>
        min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
            <span aria-hidden="true" class="sr-only">Next</span>
            <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </a>
    </nav>
    <!-- End Pagination -->

</section>




<?php require_once('./template/footer.php') ?>