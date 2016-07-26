<?php

require_once 'config.php';

$conn = new mysqli(DB_URL, DB_USER , DB_PASSWORD, DB);
    
if (!$conn) {
        die('Can not connect to database: ' . $conn->connect_error);
}