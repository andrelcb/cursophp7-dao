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

            $this->setData($resultSql[0]);
        }
    }
    
    public function listarUsuarios()
    {
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM usuario;");
    }
    
    
    public function buscaUsuarioPorlogin($login)
    {
        $sql = new Sql();
        
        return $result = $sql->select("SELECT * FROM usuario WHERE login LIKE :LOGIN",[
            ":LOGIN" => "%".$login."%"
            ]);
        }
        
    public function confirmarLogin($login, $password)
    {
        $sql = new Sql();
        
        $resultSql = $sql->select("SELECT * FROM usuario WHERE login = :LOGIN AND senha = :PASSWORD",[
            ":LOGIN"   => $login,
            ":PASSWORD" => $password
        ]);

        if(count($resultSql) > 0)
        {
            $this->setData($resultSql[0]);
        }
        else
        {
            echo "pode logar nao";
        }
        
    }

    public function setData($data)
    {
        
        $this->setIdusuario($data['idusuario']);
        $this->setLogin($data['login']);
        $this->setSenha($data['senha']);
        $this->setDataCadastro(new DateTime($data['data_cadastro']));
    }
        
    
    public function insert()
    {
        $sql = new Sql();
        
        $result = $sql->select("CALL sp_usuario_insert(:LOGIN, :PASSWORD)", array(
            ":LOGIN"=>$this->getLogin(),
            ":PASSWORD"=>$this->getSenha()
        ));

        if(count($result) > 0)
        {
            $this->setData($result[0]);
        }
    }


    public function update($login, $senha)
    {
        $this->setLogin($login);
        $this->setSenha($senha);

        $sql = new Sql();

        $sql->query("UPDATE usuario SET login = :LOGIN, senha = :SENHA WHERE idusuario = :ID",[
            ":LOGIN" => $this->getLogin(),
            ":SENHA" => $this->getSenha(),
            ":ID"    => $this->getIdusuario()
        ]);
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query("DELETE FROM usuario WHERE idusuario = :ID",[
            ":ID"=>$this->getIdusuario()
        ]);


        $this->setIdusuario(0);
        $this->setLogin("");
        $this->setSenha("");
        $this->setDataCadastro(new DateTime());
    }

    public function __construct($login = "", $senha = "")
    {
        $this->setLogin($login);
        $this->setSenha($senha);
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