<?php
include 'connection.php';
include 'totalprice.php';

$data = file_get_contents('php://input');
// parsing json data & returns an associative array
$data = json_decode($data, true);

$productName = trim($data['product_name']);
$quantity = trim($data['product_quantity']);
$price = trim($data['product_price']);
$totalValue = trim($data['totalValue']);
$isUpdate = $data['isUpdate'];
$productId = ($isUpdate) ? $data['productId'] : null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($data['submit'])) {

    if (!empty($productName) && !empty($quantity) && !empty($price) && !empty($totalValue)) {
        $datetime = date('Y-m-d H:i:s');
        try {

            if ($isUpdate) {
                $updateQuery = $connect->prepare("UPDATE products SET product_name=?, quantity=?, price=?, datetime=?, total_value=? WHERE id=?");
                $updateQuery->bind_param("sidsdi", $productName, $quantity, $price, $datetime, $totalValue, $productId);
                $updateQuery->execute();

                $response = json_encode(['id' => $productId, 'datetime' => $datetime, 'total_sum' => getSum()]);
                print_r($response);
            } else {
                // prepare and bind
                $insertQuery = $connect->prepare("INSERT INTO products (product_name, quantity, price, datetime, total_value) VALUES (?, ?, ?, ?, ?)");
                $insertQuery->bind_param("sidsd", $productName, $quantity, $price, $datetime, $totalValue);
                $insertQuery->execute();

                $response = json_encode(['id' => mysqli_insert_id($connect), 'datetime' => $datetime, 'total_sum' => getSum()]);
                print_r($response);
            }
        } catch (Exception $e) {
            $response = json_encode($e->getMessage());
            print_r($response);
            exit(1);
        }
    } else {
        $response = json_encode('All the fields are required');
        print_r($response);
        exit(1);
    }
} else {
    $response = json_encode('All the fields are required');
    print_r($response);
    exit(1);
}
