<?php
const DB_HOST = 'localhost';
const DB_NAME = 'mydb';
const DB_USER = 'root';
const DB_PASS = 'secret';
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
?>
