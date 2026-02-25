<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(404);
    require "controllers/404.php";
    die();
}

$id = $_POST["id"] ?? null;

if (!Validator::number($id)) {
    http_response_code(404);
    require "controllers/404.php";
    die();
}

$db->query("DELETE FROM fruits WHERE id = :id", [":id" => $id]);

header("Location: /");
exit();