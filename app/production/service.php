<?php

$host = 'localhost';
$user = 'admin';
$pass = 'admin';
$db = 'yoguku_production';
$con = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($con));


function generatetoken($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_GET['action'] == 'all') {
    $sql = "SELECT * FROM `user`";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
if ($_GET['action'] == 'new_demand') {
    
    $sql = "INSERT INTO user VALUES('','$nama','$kota')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $pesan = 'success';
    } else {
        $pesan = 'failed';
    }
    echo $pesan;
}
if ($_GET['action'] == 'detail') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `user` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);
    if ($row != NULL) {
        echo json_encode($row);
    } else {
        echo 'fail';
    }
}
if ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    if ($query == TRUE) {
        $message = "Deleted";
    } else {
        $message = mysqli_error($query);
    }
    echo $message;
}
if ($_GET['action'] == 'update') {
    $data = json_decode(file_get_contents('php://input'));
    $nama = $data->nama;
    $kota = $data->kota;
    $id = $data->id;

    $sql = "UPDATE `user` SET `nama` = '{$nama}' , `kota` = '{$kota}' WHERE `id` = '{$id}'";
    $query = mysqli_query($con, $sql);
    if ($query == TRUE) {
        $message = "Success Update Data";
    } else {
        $message = mysqli_error($query);
    }
    echo $message;
}

if ($_GET['action'] == 'login') {
    $data = json_decode(file_get_contents('php://input'));    
    $username = $data->username;
    $password = $data->password;
    $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}' ";    
    $query = mysqli_query($con, $sql);    
    $row = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);      
      
    if ($count > 0) {
        if ($row != NULL) {
            $username = $row["username"];
            $token = generatetoken();
            $sqlinsert = "INSERT INTO `token` VALUES('','{$username}','{$token}',now(),now() + interval 1 day ) ";
            $inserttoken = mysqli_query($con, $sqlinsert);
            if ($inserttoken) {
                $status = "OK";
                $message = "Success Login";
                $data = array("status" => $status, "message" => $message, "token" => $token);
            } else {
                $status = "FAIL";
                $message = "Failed Create Token";                
                $data = array("status" => $status, "message" => $message);
            }
            echo json_encode($data);
        } else {
            $status = "FAIL";
            $message = "Failed Login";
            $data = array("status" => $status, "message" => $message);
            echo json_encode($data);
        }
    } else if ($count == 0) {
        $status = "FAIL";
        $message = "Failed Login";
        $data = array("status" => $status, "message" => $message);
        echo json_encode($data);
    }
}

if($_GET['action'] == 'authtoken'){
    $data = json_decode(file_get_contents('php://input'));    
    $token = $data->token;
    $username = $data->username;
    $sql = "SELECT * FROM `token` WHERE `token` = '{$token}' AND `username` = '{$username}'";
    $query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0){        
        echo 'OK';
    }
    else{
        echo 'FAILED';
    }
}

if($_GET['action'] == 'deletetoken'){
    $data = json_decode(file_get_contents('php://input'));    
    $token = $data->token;
    $username = $data->username;
    $sql = "DELETE FROM `token` WHERE `username` = '{$username}' AND `token` = '{$token}'";
    $query = mysqli_query($con,$sql);
    if($query == TRUE){
        echo 'OK';
    }
    else{
        echo 'FAILED';
    }
}
?>