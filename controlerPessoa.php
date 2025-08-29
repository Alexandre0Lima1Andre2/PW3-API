<?php 
    include_once 'modeloPessoa.php';
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['txt_nome'];
        $cpf = $_POST['txt_cpf'];
        $cpf = $_POST['txt_tel'];
        
        $pessoa() = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setTelefone($telefone);

    }else{
        echo 'Não foi Possível cadastrar!';
    }
    
?>