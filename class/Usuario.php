<?php

class Usuario
{
    private $idusuario;
    private $login;
    private $senha;
    private $dataCadastro;


    public function listaUsuarioPorId($id)
    {
        $sql = new Sql();
        
        $resultSql = $sql->select("SELECT * FROM usuario WHERE idusuario = :ID", array(
            ":ID" => $id
        ));

        if(count($resultSql) > 0)
        {
            $row = $resultSql[0];

            $this->setIdusuario($row['idusuario']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDataCadastro(new DateTime($row['data_cadastro']));
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"    => $this->getIdusuario(),
            "login"        => $this->getLogin(),
            "senha"        => $this->getSenha(),
            "dataCadastro" => $this->getDataCadastro()->format("d/m/y")
        ));
    }

    

    /**
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of dataCadastro
     */ 
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     *
     * @return  self
     */ 
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }
}

?>