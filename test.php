<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=u82089', 'u82089', '4044723');
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>