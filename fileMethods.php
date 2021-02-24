<?php
// touch("text.txt");
// $file = fopen("text.txt", "a");
// fwrite($file,"Hello World ");
// fclose($file);

// ################################### fread
// $file = fopen("text.txt", "r");
// echo fread($file, filesize("text.txt"));
// fclose($file);


// ################################## gets
// $file = fopen("text.txt", "a+");
// echo fgets($file);
// print_r(feof($file));
// fclose($file);

// $file = fopen("text.txt", "a+");
// while(!feof($file)){
//     echo fgets($file);
// }
// fclose($file);

// touch("text2.txt");
// $file2 = fopen("text2.txt","w");
// fwrite($file2,"Hello World");
// fclose($file2);

// ################################## delete
// unlink("text2.txt");

// echo (file_exists("text.txt")) ? "true" : "false";

// ################################## folder
// mkdir("test"); // create
// rmdir("test"); // delete



// ################################### Example
// # scandir
// function listFiles($fileName){
//     $files = scandir($fileName);
//     echo "<ul>";
//     foreach($files as $file){
//         if(!in_array($file, [".",".."])){
//             echo "<li>" . $file;
//             if(is_dir($fileName . "/". $file)){
//                 listFiles($fileName . "/". $file);
//             }
//             echo "</li>";
//         }
        
//     }
//     echo "</ul>";
// }

// listFiles(".");


// # glob
// function listFiles($fileName){
//     $files = glob($fileName);
//     echo "<ul>";
//     foreach($files as $file){
//         echo "<li>" . $file;
//         if(is_dir($file)){
//             listFiles($file. "/*");
//         }
//         echo "</li>";
//     }
//     echo "</ul>";

// }

// listFiles("*");

// rename("test/test/test.php","test/test.php");



?>