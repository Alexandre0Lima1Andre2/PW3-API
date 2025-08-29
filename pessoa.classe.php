<?php
    
    class Pessoa{
        public $id;
        public $nome;
        public $cpf;
        public $telefone;

        public function getId(){
            return $this->id = $id;
        }
        public function setID($id){
            return $this->id = $id;
        }

        public function getNome(){
            return $this->nome = $nome;
        }
        public function setNome($nome){
            return $this->nome = $nome;
        }

        public function getICpf(){
            return $this->cpf = $cpf;
        }
        public function setCpf($cpf){
            return $this->cpf = $cpf;
        }
        
        public function getTelefone(){
            return $this->telefone = $telefone;
        }
        public function setTelefone($telefone){
            return $this->telefone =$telefone;
        }

        
    }


?>