<?php

function postdata($data) {
    $warehouse_url = "http://localhost/restapi/public/api/";
    $client = curl_init();
    $data = json_encode($data);
    $options = array(
        CURLOPT_URL => $warehouse_url . 'client/login', // Set URL of API
        CURLOPT_CUSTOMREQUEST => "POST", // Set request method
        CURLOPT_RETURNTRANSFER => true, // true, to return the transfer as a string
        CURLOPT_POSTFIELDS => $data, // Send the data in HTTP POST
    );
    curl_setopt_array($client, $options);
    $response = curl_exec($client);
    $httpCode = curl_getinfo($client, CURLINFO_HTTP_CODE);
    curl_close($client);
    return $response;
}

function generatecode($length = 10) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkheader() {
    $get = getallheaders();
    if (isset($get['production_access_token'])) {
        $token = $get['production_access_token'];
        if ($token == "" OR $token == FALSE) {
            $data = response_fail();
            echo json_encode(data);
            exit();
        } else {
            return $token;
        }
    } else {
        $data = response_fail();
        echo json_encode($data);
        exit();
    }
}

?>