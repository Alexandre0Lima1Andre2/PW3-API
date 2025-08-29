<?php
    include_once "controlerPessoa.php";
    include_once "conexao.php";
    
    class ModelPessoa{
        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }
    

   
    public function create($nome, $cpf, $telefone){
        $sql = "INSERT INTO Pessoa (nome_pessoa, cpf_pessoa, telefone_pessoa) VALUES (:nome, :cpf, :telefone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":telefone", $telefone);
        return $stmt->execute();
    }

    
    public function readAll() {
        $sql = "SELECT * FROM Pessoa";
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