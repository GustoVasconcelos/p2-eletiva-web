<?php

class TabletsController
{
    private $tabletsModel;

    public function __construct($database)
    {
        $this->tabletsModel = new Tablets($database);
    }

    // validador dos campos da tablets
    private function validadorCamposTablets($dados)
    {
        // inicializa o array de erros
        $erros = [];

        // valida se o título esta vazio
        if (!InputHelper::validaRequerido($dados['tabDescricao'])) {
            $erros[] = "O campo 'descricao' é obrigatório";
        }

        // valida se a descricao esta vazia
        if (!InputHelper::validaRequerido($dados['tabFabricante'])) {
            $erros[] = "O campo 'fabricante' é obrigatório";
        }

        // valida se a data de vencimento esta vazia
        if (!InputHelper::validaRequerido($dados['tabNumeroSerie'])) {
            $erros[] = "O campo 'numero de serie' é obrigatório";
        }

        return $erros;
    }

    // lista todas as tablets, acao principal
    public function listar()
    {   // se estiver sem filtro
        $tablets = $this->tabletsModel->listAll();
        // chama a view com as listagens
        require ROOT_PATH . '/app/views/tablets/index.php';
    }

    // processa a criacao de tablets
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // limpa todo o $_POST de uma só vez
            $dados = InputHelper::limpaArray($_POST);

            // chama o validador de campos da tablets
            $erros = $this->validadorCamposTablets($dados);

            // se nao tiver nenhum erro...
            if (empty($erros)) {
                // recebe os dados e cria a tablets no banco de dados
                $this->tabletsModel->create($dados['tabDescricao'], $dados['tabFabricante'], $dados['tabNumeroSerie'], $dados['tabAcessorios']);

                // redireciona para a página principal
                header('Location: index.php?action=listar');
            }
        }

        // se for uma requisicao GET, ele mostra a pagina de criacao da tablets
        // se a validacao do POST falhou...retorna a view com as mensagens de erro do array $erros
        require ROOT_PATH . '/app/views/tablets/create.php';
    }

    // busca a tablets pelo ID, e retorna a pagina de edicao com os dados da tablets
    public function edit($tabCod)
    {

        // usa o método para buscar a tablets no banco de dados usando o id
        $returnTablets = $this->tabletsModel->getById($tabCod);

        // faz o fecth da tablets
        $tablets = $returnTablets->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // limpa todo o $_POST de uma só vez
            $dados = InputHelper::limpaArray($_POST);

            // chama o validador de campos da tablets
            $erros = $this->validadorCamposTablets($dados);

            // se nao tiver nenhum erro...
            if (empty($erros)) {
                // recebe os dados da view e da um update na tablets no banco de dados
                $this->tabletsModel->update($tabCod, $dados['tabDescricao'], $dados['tabFabricante'], $dados['tabNumeroSerie'], $dados['tabAcessorios']);

                // redireciona para a página principal
                header('Location: index.php?action=listar');
            }
        }

        // se for uma requisicao GET, ele mostra a pagina de edicao da tablets com os dados da tablets
        // se a validacao do POST falhou...retorna a view com as mensagens de erro do array $erros
        require ROOT_PATH . '/app/views/tablets/edit.php';
    }

    // processa a exclusao de tablets
    public function delete($tabCod)
    {
        // chama o método excluir do model e exclui a tablets no banco de dados
        $this->tabletsModel->delete($tabCod);

        // redireciona para a página principal
        header('Location: index.php?action=listar');
    }
}
