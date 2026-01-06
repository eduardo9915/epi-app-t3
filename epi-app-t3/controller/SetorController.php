<?php
    require_once __DIR__ . "/../repositories/SetorDAO.php";
    require_once __DIR__ . "/../model/Setor.php";
    class SetorController {
        private ?SetorDAO $dao;
        
        public function __construct() {
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $this->dao = new SetorDAO();
        }

        public function inserirSetor(string $requisicao) {
            if ($requisicao === "GET") {
                include "./view/setor/cadastrarSetor.php";
            }

            if ($requisicao === "POST") {
                $model = new Setor(
                    htmlspecialchars($_POST["nomeSetor"])
                );

                $respostaCliente = $this->dao->inserir($model);                
               if ($respostaCliente) {
                    include "./view/home.php";
                    exit;
                }
            }
        }
        public function listaTodos(string $requisicao){
            if ($requisicao === "GET"){
                $respostaBD = $this->dao->listarTodos();
                if (!empty($respostaBD)){
                   $respostaCliente = $this->converterListaSetor($respostaBD);
                   $_SESSION["listaSetor"] = $respostaCliente
                }
            }
        }
        public function converterListaSetor(array $lista){
            $novaLista = [];
            foreach ($lista as $setor){
                $model = new Setor(
                    $setor["nome_setor"],
                    $setor["id_setor"]
                );
                $novaLista[] = $model;
            }

            return $novaLista;
        }
    }
?>