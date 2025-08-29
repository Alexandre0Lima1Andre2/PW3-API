<?php
    include_once "controlerPessoa.php";

    class ModelPessoa{
        private $conn;

        public function _construct() {
        $host = 'localhost';
        $port="3306";
        $user="root";
        $senha="";
        $banco="Pessoa";

         try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

   
    public function create($nome, $cpf, $telefone) {
        $sql = "insert int Pessoa (nome_pessoa, cpf_pessoa, telefone_pessoa) values (:nome, :cpf, :telefone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":telefone", $telefone);
        return $stmt->execute();
    }

    
    public function readAll() {
        $sql = "select * from Pessoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 
    public function readById($id) {
        $sql = "select * from Pessoa where id_pessoa = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id, $nome, $cpf, $telefone) {
        $sql = "update Pessoa set nome_pessoa = :nome, cpf_pessoa = :cpf, telefone_pessoa = :telefone where id_pessoa = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":telefone", $telefone);
        return $stmt->execute();
    }

   
    public function delete($id) {
        $sql = "delete from Pessoa where id_pessoa = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    }



?>