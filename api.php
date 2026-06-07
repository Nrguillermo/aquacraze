<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "aquacraze");

if ($conn->connect_error) {
    echo json_encode(["error"=>"DB failed"]);
    exit;
}

$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {

    echo json_encode([
        "temperature" => isset($row["temperature"]) ? (float)$row["temperature"] : 0,
        "ph" => isset($row["ph"]) ? (float)$row["ph"] : 0,
        "tds" => isset($row["tds"]) ? (float)$row["tds"] : 0,
        "turbidity" => isset($row["turbidity"]) ? (float)$row["turbidity"] : 0
    ]);

} else {
    echo json_encode(["temperature"=>0,"ph"=>0,"tds"=>0,"turbidity"=>0]);
}
?>