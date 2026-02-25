<?php

function redirectIfNotFound($location = "/") {
    http_response_code(404);
    header("Location: $location", true, 302);
    exit();
}

function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}