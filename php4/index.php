<?php
$file = fopen('books.txt', 'r');
$json  = [];

 if($file) {
     echo '<pre>';
     $i = 0;
     while(!feof($file)){
         $currentString = fgets($file, 999);
         $exploaded = explode( ', ',$currentString);
         $book = [];
         $book['author'] = $exploaded[0];
         $book['book'] = $exploaded[1];
         $book['page'] = (int)$exploaded[2];
         $book['cost'] = (int)$exploaded[3];
         $json[$i] = $book;
         $i++;
    }
    
     function bookSort($a, $b) {
        if ($a['cost'] === $b['cost']){
            return 0;
        }
        return ($a['cost'] < $b['cost']) ? 1 : -1;
    }
    usort($json, 'bookSort');

    $mostExpensive = [];
    for($i =0; $i < 3; $i++){
        $mostExpensive[$i] = $json[$i];
    }

    function pageSort($a, $b) {
        if ($a['page'] === $b['page']){
            return 0;
        }
        return ($a['page'] < $b['page']) ? -1 : 1;
    }
    usort($mostExpensive, 'pageSort');
    var_dump($mostExpensive);
    

 }else {
     echo('Eror');
 }


fclose($file);

