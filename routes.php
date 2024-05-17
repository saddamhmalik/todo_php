<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
try {

    switch ($request_uri[0]) {
        case '/':
            require_once BASE_PATH . '/controllers/tasks_controller.php';
            $controller = new TasksController();
            $controller->index();
            break;
        case '/add_task':
            require_once BASE_PATH . '/controllers/tasks_controller.php';
            $controller = new TasksController();
            $controller->store();
            break;
        case '/complete_task':
            require_once BASE_PATH . '/controllers/tasks_controller.php';
            $controller = new TasksController();
            $controller->complete();
            break;
        case '/delete_task':
            require_once BASE_PATH . '/controllers/tasks_controller.php';
            $controller = new TasksController();
            $controller->delete();
            break;
        default:
            http_response_code(404);
            echo 'Page not found';
            break;
    }
} catch (Exception $e) {
    http_response_code(404);
    echo 'Page not found';
}