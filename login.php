<?php

header("Content-Type: application/json");

require_once "database.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = $data["username"] ?? "";
$password = $data["password"] ?? "";

if ($username === "" || $password === "") {

    echo json_encode([
        "message" => "Username and password are required"
    ]);

    exit;
}

try {

    $query = "SELECT username, password FROM users WHERE username = :username";

    $stmt = $conn->prepare($query);

    $stmt->execute([
        "username" => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {

        echo json_encode([
            "message" => "Invalid username"
        ]);

        exit;
    }

    if (!password_verify($password, $user["password"])) {

        echo json_encode([
            "message" => "Invalid password"
        ]);

        exit;
    }

    echo json_encode([
        "message" => "Login successful"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "message" => "Server error"
    ]);
}
