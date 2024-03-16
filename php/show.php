<?php

include 'connection.php';

try {

    $selectQuery = "SELECT * FROM products";
    $result = mysqli_query($connect, $selectQuery);
    $products = mysqli_fetch_all($result);
    $productlist = [];

    if (count($products)) {
        foreach ($products as $key => $value) {
            array_push($productlist, $value);
        }
        print_r(json_encode($productlist));
    } else {
        $response = json_encode(0);
        print_r($response);
    }
} catch (Exception $e) {
    $response = json_encode(0);
    print_r($response);
}
