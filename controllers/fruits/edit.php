<?php

$id = $_GET["id"] ?? null;

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
$old = ["name" => $fruit["name"]];
$showErrors = false;

require "views/fruits/edit.view.php";