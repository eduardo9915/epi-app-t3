<?php
require_once __DIR__ . "/controller/SetorController.php";
$setorController = new SetorController();
$requisicao = $_SERVER["REQUEST_METHOD"];
//arquivo responsavel pelo gerenciamento de rotas
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $request = $_SERVER["REQUEST_METHOD"];
    $base_path = "/paulo-t3/epi-app-t3/";

    switch ($url) {
        case $base_path:
            include "./view/home.php";
            break;
        case $base_path . "setor/cadastro":
            $setorController->inserirSetor($requisicao);
            break;

        case $base_path . "setor/lista":
            include "./view/setor/listaSetor.php";
            break;
        default:
            header("Location: ./view/error.php");
            exit;
            break;
    }