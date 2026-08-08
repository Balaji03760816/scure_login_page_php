<?php

try {

    $conn = new PDO(
        "pgsql:host=localhost;port=5432;dbname=user_login",
        "postgres",
        "1234"
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Database Connection Failed: " . $e->getMessage());

}

?>