<?php

include 'connection.php';

$id=$_GET['id'];

try{
    $query=mysqli_query($connect,"SELECT * FROM products WHERE id=$id");
    $product=mysqli_fetch_assoc($query);

    print_r(json_encode($product));
}
catch(Exception $e){
    print_r(json_encode(0));
}

?>