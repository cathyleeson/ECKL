<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
trait Connector {
    function connect() {
        $dsn = "mysql:host=localhost; dbname=song_library";
        $user = 'keishahunt';
        $password = "ihuntdabestsongz";
        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Oops! Failed to connect.... " . $e->getMessage());
        }
        return $pdo;
    }
}
