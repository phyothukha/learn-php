<?php
// system("clear");
echo "<pre>";
require_once "./autoload.php";
// require_once "./classes/PrentClass.php";


// $p = new ParentClass("aa", "bb", "cc");


// print_r($p);
// $request = new Request();
// echo $request->get();
// echo $request->file();
// echo $request->files();
// echo $request->length();
// echo $request->post();


function makeSound(Animal $animal)
{
    return $animal->makeSound();
}

$cat = new Cat;
$dog = new Dog;
echo makeSound($cat);
echo makeSound($dog);

// $c = new Child("aaa", "vvv", "ccc", "hello", "world");
// print_r($c);

// $students = new Student;

// print_r($students
//     ->select()
//     ->limit(5)
//     ->fetchAll());

// $batch = new Batch;

// print_r($batch
//     ->select()
//     ->fetchAll());
// $course = new Course;
// print_r($course
//     ->select()
//     ->limit(5)
//     ->fetchAll());



// $db = new Db();
// print_r($db->first("SELECT * FROM students LIMIT 10"));

// require_once "./classes/FileWriter.php";

// $file = new FileWriter(__DIR__ . "/notes/test.text");

// $file->fwrite("Hello");
// $file->fwrite("Nay");
// $file->fwrite("Kaung");
// $file->fwrite("Lar");


// require_once "./classes/QueryBuilder.php";

// $queryBuilder = new QueryBuilder("students");
// $db = new Db;

// // print_r($qb->a()->b()->c());
// $students = $db->fetchAll(
//     $queryBuilder->select()
//         ->where("gender_id", "=", 1)
//         ->where("pocket_money", ">", 500)
//         ->orderBy("name", "DESC")
//         ->orderBy("id", "ASC")
//         ->limit(5)
//         ->sql()
// );

// print_r($students);

// require_once "./classes/TextFilter.php"

//  $textFilter = new TextFilter(['San Kyi Tar',"San LNay Tar"]);

// echo $textFilter;

// require_once "./classes/FacebookUser.php";

// $facebook = new FacebookUser("Phyo Thu Kha", "123456789", ["a", "b", "c"]);

// print_r($facebook);

// require_once "./classes/BankAccount.php";


// $bankAccount = new BankAccount("Phyo Thu Kha", 300);

// $bankAccount->deposit(500);
// $bankAccount->withDraw(200);
// $bankAccount->transfer("atm", 300);
// echo "<br>";
// $bankAccount->onlineDeposit("wave pay", 200);
// echo "<br>";
// echo $bankAccount->checkBalance();
// $bankAccount->setBalance(200);





// print_r($parent);

// echo $bankAccount->getBalance();