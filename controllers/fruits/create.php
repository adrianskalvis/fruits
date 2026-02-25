<?php

$errors = [];
$old = ["name" => ""];
$showErrors = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $showErrors = true;

    $name = $_POST["name"] ?? "";
    $old["name"] = $name;

    if (!Validator::string($name, 2, 40)) {
        $errors["name"] = "Augļa nosaukumam jābūt no 2 līdz 40 rakstzīmēm garam";
    }

    if (empty($errors)) {
        $db->query(
            "INSERT INTO fruits (name) VALUES (:name)",
            [":name" => trim($name)]
        );

        $id = $db->lastInsertId();
        header("Location: /fruits/show?id=" . urlencode($id));
        exit();
    }
}

require "views/fruits/create.view.php";