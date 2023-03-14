<?php
$username = 'root';
$password = 'cisco';
$pdo = new PDO('mysql:host=database;port=3306;dbname=stuff', $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);