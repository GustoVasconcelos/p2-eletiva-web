<?php

class Tablets {
    private $tabCod;
    private $tabDescricao;
    private $tabFabricante;
    private $tabNumeroSerie;
    private $tabAcessorios;

    // atributos de inicialização da conexao
    private $conexao;
    private $tableName = "tablets";

    //método construtor, que inicializa o objeto do banco de dados
    public function __construct($database) {
        // inicializa o atributo conexao (Tipo Database) com os dados de acesso do banco
        $this->conexao = $database->getConnection();
    }

    //métodos gets e sets da classe
    public function getTabCod() {
        return $this->tabCod;
    }

    public function setTabDescricao($descricao) {
       $this->tabDescricao = $descricao;
    }

    public function getTabDescricao() {
        return $this->tabDescricao;
    }

    public function setTabFabricante($fabricante) {
        $this->tabFabricante = $fabricante;
    }

    public function getTabFabricante() {
        return $this->tabFabricante;
    }

    public function setTabNumeroSerie($numeroSerie) {
        $this->tabNumeroSerie = $numeroSerie;
    }

    public function getTabNumeroSerie() {
        return $this->tabNumeroSerie;
    }

    public function setTabAcessorios($acessorios) {
        $this->tabAcessorios = $acessorios;
    }

    public function getTabAcessorios() {
        return $this->tabAcessorios;
    }

    // métodos de acesso ao banco de dados

    public function listAll() {
        //método de buscar os tablets no banco
        try {
            $comandoSQL= "SELECT * FROM ".$this->tableName;

            $acesso = $this->conexao->prepare($comandoSQL);
            if($acesso->execute()) {
                return $acesso;
            }
            return $acesso;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
        return false;
    }

    public function getById($tabCod) {
        //método de buscar tablet por seu codigo
        try {
            $comandoSQL= "SELECT * FROM ".$this->tableName." WHERE tab_cod = :param1";
            $acesso = $this->conexao->prepare($comandoSQL);

            $acesso->bindParam(":param1", $tabCod);

            if ($acesso->execute()) {
                return $acesso;
            }
            return false;       
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
        return false;
    }

    public function create($descricao, $fabricante, $numeroSerie, $acessorios) {
        //método que cria um tablet no banco
        try {
            $comandoSQL= "INSERT INTO ".$this->tableName." (tab_descricao, tab_fabricante, tab_numeroserie, tab_acessorios) values (:param1,:param2, :param3, :param4)";
            $acesso = $this->conexao->prepare($comandoSQL);
            
            $acesso->bindParam(":param1", $descricao);
            $acesso->bindParam(":param2", $fabricante);
            $acesso->bindParam(":param3", $numeroSerie);
            $acesso->bindParam(":param4", $acessorios);

            if ($acesso->execute()) {
                return true;
            }
            return false;       
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
        return false;
    }

    public function update($tabCod, $descricao, $fabricante, $numeroSerie, $acessorios) {
        //método que atualiza o tablet no banco
        try {
            $comandoSQL = "UPDATE ".$this->tableName." SET
                       tab_descricao = :param2,
                       tab_fabricante = :param3,
                       tab_numeroserie = :param4,
                       tab_acessorios = :param5
                       WHERE tab_cod = :param1";
            $acesso = $this->conexao->prepare($comandoSQL);

            $acesso->bindParam(":param2", $descricao);
            $acesso->bindParam(":param3", $fabricante);
            $acesso->bindParam(":param4", $numeroSerie);
            $acesso->bindParam(":param5", $acessorios);
            $acesso->bindParam(":param1", $tabCod);
            
            if ($acesso->execute()) {
                return true;
            }
            return false;       
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
        return false;
    }

    public function delete($tabCod) {
        //método que deleta um tablet do banco
        try {
            $comandoSQL = "DELETE FROM ".$this->tableName." WHERE tab_cod = :param1";
            $acesso = $this->conexao->prepare($comandoSQL);

            $acesso->bindParam(":param1", $tabCod);
            
            if ($acesso->execute()) {
                return true;
            }
            return false;       
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
        return false;
    }

}