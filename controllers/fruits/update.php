<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(404);
    require "controllers/404.php";
    die();
}

$id = $_POST["id"] ?? null;
$name = $_POST["name"] ?? "";

if (!Validator::number($id)) {
    http_response_code(404);
    require "controllers/404.php";
    die();
}

$fruit = $db->query(
    "SELECT id, name FROM fruits WHERE id = :id",
    [":id" => $id]
)->fetch();

if (!$fruit) {
    http_response_code(404);
    require "controllers/404.php";
    die();
}

$errors = [];
$old = ["name" => $name];
$showErrors = true;

if (!Validator::string($name, 2, 40)) {
    $errors["name"] = "Augļa nosaukumam jābūt no 2 līdz 40 rakstzīmēm garam";
}

if (!empty($errors)) {
    $fruit["name"] = $name;
    require "views/fruits/edit.view.php";
    exit();
}

$db->query(
    "UPDATE fruits SET name = :name WHERE id = :id",
    [":name" => trim($name), ":id" => $id]
);

header("Location: /fruits/show?id=" . urlencode($id));
exit();