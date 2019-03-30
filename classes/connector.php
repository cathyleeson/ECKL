<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
trait Connector {
    function connect() {
        $DB_DSN = "mysql:host=localhost; dbname=song_library";
        $DB_USER = 'root';
        $DB_PASS = '';
        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Failed to connect. " . $e->getMessage());
        }
        return $pdo;
    }
}
