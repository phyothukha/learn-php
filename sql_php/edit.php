<?php
$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");

if (!$conn) {
    die(mysqli_connect_errno());
}

$id = $_GET['row_id'];

$sql = "SELECT * FROM products where id= $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>



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

        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Product
        </li>
    </ol>
    <hr class=" my-3  border-gray-200">


    <form action="./update.php" method="post">
        <h1 class=" text-xl font-medium mb-5">Update Product</h1>
        <div class=" flex gap-5 items-end ">
            <input type="hidden" name="row_id" id="row_id" value="<?= $row['id'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Product Name">

            <div class="max-w-sm ">
                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Width</label>
                <input type="text" value="<?= $row['name'] ?>" name="name" id="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Product Name">
            </div>
            <div class="max-w-sm ">
                <label for="price" class="block text-sm font-medium mb-2 dark:text-white">Breadth</label>
                <input type="text" name="price" value="<?= $row['price'] ?>" id="price" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Product Price">
            </div>
            <div class="max-w-sm ">
                <label for="stock" class="block text-sm font-medium mb-2 dark:text-white">Breadth</label>
                <input type="number" name="stock" id="stock" value="<?= $row['stock'] ?>" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Product Stock">
            </div>

            <button type="submit" class=" max-w-sm px-5 py-3 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Update
            </button>
        </div>
    </form>

</section>


<?php require_once('./template/footer.php') ?>