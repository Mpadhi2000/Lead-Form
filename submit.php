<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo json_encode(["success" => "POST request received!"]);
} else {
    echo json_encode(["error" => "Invalid request method: " . $_SERVER["REQUEST_METHOD"]]);
}
?>


