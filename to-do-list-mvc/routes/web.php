<?php
require_once __DIR__ . '/../app/controllers/TaskController.php';

$controller = new TaskController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo "Requested URI: " . $uri . "<br>";
// echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";


if ($uri === '/' || $uri === '/index.php') {
    $controller->index();
} elseif ($uri === '/task/fetch' && $_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->fetchTasks();
} elseif ($uri === '/task/add' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->addTask();
} elseif ($uri === '/task/delete') {
    $controller->deleteTask();
} elseif ($uri === '/task/update' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->updateTask();
} else {
    http_response_code(404);
    echo "404 Not Found";
}
?>