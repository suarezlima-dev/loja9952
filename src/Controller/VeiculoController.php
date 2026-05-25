<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\VeiculoModel;

class VeiculoController
{
    private VeiculoModel $model;

    public function __construct()
    {
        $this->model = new VeiculoModel();
    }

    public function catalogo(): void
    {
        $filtros = [
            'marca_id' => (int) ($_GET['marca_id'] ?? 0) ?: null,
            'combustivel' => $_GET['combustivel'] ?? null,
            'preco_max' => (float) ($_GET['preco_max'] ?? 0) ?: null,
            'ano_min' => (int) ($_GET['ano_min'] ?? 0) ?: null,
            'pesquisa' => trim($_GET['pesquisa'] ?? ''),
        ];
        $filtros = array_filter($filtros);

        $veiculos = $this->model->listar($filtros);
        $marcas = $this->model->getMarcas();
        $combustiveis = $this->model->getCombustiveis();
        $titulo = 'Catalogo de Veiculos';
        $baseUrl = $this->baseUrl();

        require __DIR__ . '/../../templates/veiculos/catalogo.php';
    }

    public function detalhe(int $id): void
    {
        if ($id <= 0) {
            $this->renderNaoEncontrado();
            return;
        }

        $veiculo = $this->model->getById($id);
        if (!$veiculo) {
            $this->renderNaoEncontrado();
            return;
        }

        $titulo = $veiculo['marca'] . ' ' . $veiculo['modelo'];
        $baseUrl = $this->baseUrl();

        require __DIR__ . '/../../templates/veiculos/detalhe.php';
    }

    private function renderNaoEncontrado(): void
    {
        http_response_code(404);
        $titulo = 'Veiculo nao encontrado';
        $baseUrl = $this->baseUrl();

        require __DIR__ . '/../../templates/veiculos/nao-encontrado.php';
    }

    private function baseUrl(): string
    {
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        if (!str_starts_with($scriptName, '/')) {
            return '';
        }

        $base = dirname($scriptName);
        return $base === '/' || $base === '.' ? '' : rtrim($base, '/');
    }
}
