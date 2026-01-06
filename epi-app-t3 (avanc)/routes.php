<?php
require_once __DIR__ . "/controller/SetorController.php";
$setorController = new SetorController();
$requisicao = $_SERVER["REQUEST_METHOD"];
//arquivo responsavel pelo gerenciamento de rotas
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $request = $_SERVER["REQUEST_METHOD"];

    switch ($url) {
        case "/epi-app-t3/":
            include "./view/home.php";
            break;
        case "/epi-app-t3/setor/cadastro":
            $setorController->inserirSetor($requisicao);
            break;

        case "/epi-app-t3/setor/lista":
            $setorController->listaTodosSetores($requisicao);
            break;
        case "/epi-app-t3/setor/exclui":
            $setorController->excluirSetores($requisicao);
            break;
        default:
            header("Location: ./view/error.php");
            exit;
            break;
    }