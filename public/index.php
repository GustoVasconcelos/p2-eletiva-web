<?php
// inicia a sessão em todas as páginas
session_start();

// define a constante com o caminho absoluto para a raiz do projeto
define('ROOT_PATH', dirname(__DIR__));

// usa a constante para incluir os arquivos

// classe do banco de dados
require_once ROOT_PATH . '/config/database.php';

// controllers
require_once ROOT_PATH . '/app/controllers/TabletsController.php';

// models
require_once ROOT_PATH . '/app/models/Tablets.php';

// helpers
require_once ROOT_PATH . '/app/helpers/InputHelper.php';

// inicia o objeto de banco de dados
$database = new Database('localhost', 'protudos', 'root', '');

// roteamento
$controller = $_GET['controller'] ?? 'tablets';
$action = $_GET['action'] ?? 'listar';
$id = $_GET['id'] ?? null;

// roteamento para as acoes dos tablets
$tabletsController = new TabletsController($database);

if ($controller == "tablets") {
    switch ($action) {
        case 'create':
            $tabletsController->create();
            break;
        case 'edit':
            $tabletsController->edit($id);
            break;
        case 'delete':
            $tabletsController->delete($id);
            break;
        case 'listar':
        default:
            $tabletsController->listar();
            break;
    
    }
}