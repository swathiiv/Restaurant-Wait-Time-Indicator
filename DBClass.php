<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBClass
 *
 * @author ProjectSystem
 */
class DBClass {

    public function GetConn() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotelbooking";
        $conn = null;
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    public function GetSourcePath() {
        return "C:\\Users\\ProjectSystem\\Desktop\\New folder\\";
    }

    public function GetDestPath() {
        return "C:\\xampp\\htdocs\\SoilTest\\assets\\img\\";
    }
}
