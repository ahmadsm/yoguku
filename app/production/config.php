<?php

class config {

    public function connection() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'yoguku_production';
        $con = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($con));
        return $con;
    }

    public function checktoken($token) {
        $sql = "SELECT * FROM `production_access` WHERE `code` = '$token'";
        $query = mysqli_query($this->connection(), $sql);
        $count = mysqli_num_rows($query);
        return $count;
    }

    public function login($input) {
        $sql = "SELECT * FROM `user` WHERE `username` = '$input->username' AND `password` = '$input->password' ";
        $query = mysqli_query($this->connection(), $sql);
        $count = mysqli_num_rows($query);
        return $count;
    }

    public function get_api_access() {
        $sql = "SELECT * FROM `api_access`";
        $query = mysqli_query($this->connection(), $sql);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    public function add_production_token($token) {
        $sql = "INSERT INTO `production_access` VALUES('','$token','')";
        $query = mysqli_query($this->connection(), $sql);
        return $query;
    }

    public function change_api_access($input) {        
        $sql = "UPDATE `api_access` SET `username` = '$input->username' , `password` = '$input->password' WHERE `id` = $input->id";
        $query = mysqli_query($this->connection(), $sql);
        return $query;
    }

}
?>
