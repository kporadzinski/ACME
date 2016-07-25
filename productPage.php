<?php

require_once 'src/config.php';
require_once 'src/conn.php';
require_once 'src/Product.php';

$product = new Product($conn);

$array = $product->getProductByCategory();//defalut: all categories
foreach ($array as $item){
    foreach ($item as $key => $value){
        echo ' '.$key.' => '.$value.'<br>';
    }
    
    $photos = $product->getProductPhotos($item['id']);
    if (isset($photos)){
        foreach ($photos as $photo){
            echo $photo.'<br>';
        }
    }
    echo '<br>';
}