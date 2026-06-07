<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "aquacraze");

if ($conn->connect_error) {
    die(json_encode([]));
}

$sql = "SELECT temperature, ph, tds, turbidity
        FROM sensor_data
        ORDER BY id DESC
        LIMIT 20";

$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(array_reverse($data));
?>