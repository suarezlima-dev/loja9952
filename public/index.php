<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$envPath = __DIR__ . '/../.env';
if (is_file($envPath)) {
    $env = parse_ini_file($envPath, false, INI_SCANNER_RAW) ?: [];
    foreach ($env as $k => $v) {
        $_ENV[$k] = $v;
        putenv($k . '=' . $v);
    }
}

use App\Controller\VeiculoController;

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$basePath = str_starts_with($scriptName, '/') ? dirname($scriptName) : '/';
if ($basePath !== '/' && str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath)) ?: '/';
}

$uri = trim($path, '/');
$partes = $uri === '' ? [] : explode('/', $uri);
$recurso = $partes[0] ?? '';
$acao = $partes[1] ?? '';
$id = (int) ($partes[2] ?? 0);

$ctrl = new VeiculoController();

match (trim("$recurso/$acao", '/')) {
    '' => $ctrl->catalogo(),
    'veiculo/detalhe' => $ctrl->detalhe($id),
    default => $ctrl->catalogo(),
};
