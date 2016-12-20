<?php

include './config.php';
include './function.php';
include './response.php';


$service = new config();


if ($_GET['action'] == 'checkapiaccess') {
    try {
        $token = checkheader();
        $auth = $service->checktoken($token);
        if ($auth != "") {
            $apidata = $service->get_api_access();
            $data = get_success($apidata);
        } else {
            $data = response_fail();
        }
        echo json_encode($data);
    } catch (Exception $e) {
        $data = response_fail();
    }
}

if ($_GET['action'] == 'validateapiaccess') {
    try {
        $token = checkheader();
        $auth = $service->checktoken($token);
        if ($auth != "") {
            $input = json_decode(file_get_contents('php://input'));
            $post = postdata($input);
            $response = json_decode($post);
            if ($response->response == "OK") {
                $data = response_success();
            } else {
                $data = response_fail();
            }
        } else {
            $data = response_fail();
        }
    } catch (Exception $e) {
        $data = response_fail();
    }
    echo json_encode($data);
}

if ($_GET['action'] == 'changeapiaccess') {
    try {
        $token = checkheader();
        $auth = $service->checktoken($token);
        if ($auth != "") {
            $input = json_decode(file_get_contents('php://input'));
            $update = $service->change_api_access($input);
            if ($update == TRUE) {
                $data = response_success();
            } else {
                $data = response_fail();
            }
        } else {
            $data = response_fail();
        }
    } catch (Exception $e) {
        $data = response_fail();
    }
    echo json_encode($data);
}
if ($_GET['action'] == 'checktoken') {
    try {
        $token = checkheader();
        $auth = $service->checktoken($token);
        if ($auth != "") {
            $data = response_success();
        } else {
            $data = response_fail();
        }
    } catch (Exception $e) {
        $data = response_fail();
    }
    echo json_encode($data);
}

if ($_GET['action'] == 'login') {
    try {
        $input = file_get_contents('php://input');
        if ($input != "") {
            $data = json_decode(file_get_contents('php://input'));
            $username = $data->username;
            $password = $data->password;
            $getlogin = $service->login($data);
            if ($getlogin > 0) {
                $auth_data = $service->get_api_access();
                $data = array("username" => $auth_data['username'], "password" => $auth_data['password']);
                $post = postdata($data);
                $response = json_decode($post);
                if ($response->response == "OK") {
                    $generatecode = generatecode();
                    $addcode = $service->add_production_token($generatecode);
                    if ($addcode == TRUE) {
                        $record = array("api_access_token" => $response->token, "production_access_token" => $generatecode);
                        $data = get_success($record);
                    } else {
                        $data = response_fail();
                    }
                } else {
                    $data = response_fail();
                }
            }
        } else {
            $data = response_fail();
        }
    } catch (Exception $e) {
        $data = response_fail();
    }
    echo json_encode($data);
}
?>