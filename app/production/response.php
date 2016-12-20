<?php

define('FAIL_STATUS', "FAIL");
define('FAIL_MESSAGE', "Failed process");
define('FAIL_UPLOAD_MESSAGE', "Proses Upload Gagal");
define('FAIL_AUTH', "Authentication error");
define('OK_STATUS', "OK");
define('OK_MESSAGE', "Success process");
define('OK_UPLOAD_MESSAGE', "Proses Upload Berhasil");
define('NO_DATA_STATUS', "NONE");
define('NO_DATA_MESSAGE', "No data");
define('EMPTY_POST_STATUS', "NONE");
define('EMPTY_POST_MESSAGE', "Empty data");

function get_success($data) {
    $response = OK_STATUS;
    $message = OK_MESSAGE;
    $results = array("response" => $response, "message" => $message, "data" => $data);
    return $results;
}

function get_not_found() {
    $response = NO_DATA_STATUS;
    $message = NO_DATA_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function post_empty() {
    $response = EMPTY_POST_STATUS;
    $message = EMPTY_POST_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function response_success() {
    $response = OK_STATUS;
    $message = OK_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function response_fail() {
    $response = FAIL_STATUS;
    $message = FAIL_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function authentication_fail() {
    $response = FAIL_STATUS;
    $message = FAIL_AUTH;
    $results = array("response" => $response, "message" => $message);
    return $results;
}
