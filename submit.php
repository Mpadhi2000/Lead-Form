<?php
header("Content-Type: application/json"); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zapier_url = "https://hooks.zapier.com/hooks/catch/10942828/2e9rj9v/";

    // Get JSON input from the request
    $inputJSON = file_get_contents("php://input");

    // Forward the request to Zapier using cURL
    $ch = curl_init($zapier_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $inputJSON);
    
    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        echo json_encode(["error" => "cURL error: " . curl_error($ch)]);
    } else {
        echo $response;
    }

    curl_close($ch);
} else {
    http_response_code(405); // Send proper HTTP status for invalid method
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>