<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

try {
    // ดึงข้อมูลจาก API ของ IRZ
    $apiUrl = 'https://github.com/porsamp/api-launcher/blob/main/api.json';
    $jsonContent = file_get_contents($apiUrl);
    
    if ($jsonContent === false) {
        throw new Exception('Failed to fetch server configuration');
    }

    // ส่งข้อมูลกลับ
    echo $jsonContent;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage(),
        'status' => 'error'
    ]);
} 
