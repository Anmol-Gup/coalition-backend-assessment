<?php

function getSum()
{
    include 'connection.php';

    $sumQuery = "SELECT SUM(total_value) AS total_sum FROM products";
    $result = mysqli_query($connect, $sumQuery);
    $totalSum = 0;

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalSum = $row['total_sum'];
    }
    return $totalSum;
}

?>
