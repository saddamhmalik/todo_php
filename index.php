<?php
define('BASE_PATH', __DIR__);

$requestedUrl = isset($_GET['url']) ? $_GET['url'] : '/';
require_once BASE_PATH . '/routes.php';