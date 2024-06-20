<?php
system("clear");

// $x=["x","y","z","a","C","B",2,4,1];

// rsort($x);


// system("clear");
// $arr=["x","y","z","a","b","c","d","e"];

// // foreach(array_rand($arr,4) as $i){
// //     echo $arr[$i];
// //     echo "\n";
// // print(shuffle($arr));
// shuffle($arr);
// print_r($arr);

// // }
// $info= array("coffee","brown","caffeine");
// $sttring= "San Kyi tar Par";

// print_r(explode(" ",$sttring));
// // list($x,$y,$z)=$info;
// echo implode("-",$info);



// // ephp;
// // print(in_array("a",$arr));

// // 

// // print(end($arr));


// // print_r(array_chunk($arr,2));



// // // print_r(arsort($assoc));


// $arr= [5,6,23,45,24,2,3,1,8];

// // $r= array_map(fn($el)=>$el+3,$arr);
// $e= array_reduce($arr,fn($pv,$cv)=>$pv+$cv,0);

// print_r($e);
// system("clear");

// $posts= file_get_contents("https://jsonplaceholder.typicode.com/posts/1");

// // print($posts);

// // print("\n");

// $assoc= json_decode($posts,true);

// print_r($assoc);
// echo "\n";
// echo "\n";


// echo $assoc["title"];
// echo "\n";
// echo "\n";
// echo "\n";

// echo $assoc["body"];


// $assoc=[
//     "myName"=>"Hein Htet Zan",
//     "myAge"=>20,
//     "Gf"=>1,
//     "myJob"=>["developer","student"],
// "isHandsome"=>true
// ];

// echo json_encode($assoc);


$GLOBALS['MY_NAME']="Phyo Thu Kha";
$GLOBALS['MY_AGE']=20;

function run()  {
    return "My name is ".$GLOBALS["MY_NAME"];
    
};
// echo  run();
echo run();


// print_r($GLOBALS);
// echo "My name is ". $GLOBALS['MY_NAME'];