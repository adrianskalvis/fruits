<?php

$q = trim($_GET["q"] ?? "");

if ($q !== "") {
    $fruits = $db->query(
        "SELECT id, name FROM fruits WHERE name LIKE :q ORDER BY id DESC",
        [":q" => "%{$q}%"]
    )->fetchAll();
} else {
    $fruits = $db->query("SELECT id, name FROM fruits ORDER BY id DESC")->fetchAll();
}

require "views/fruits/index.view.php";