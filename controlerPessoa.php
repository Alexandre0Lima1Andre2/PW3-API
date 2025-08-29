<?php 
    require_once 'modeloPessoa.php';
    require_once 'pessoa.classe.php';
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['txt_nome'];
        $cpf = $_POST['txt_cpf'];
        $telefone = $_POST['txt_tel'];
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);
        $pessoa->setTelefone($telefone);

    }else{
        echo 'Não foi Possível cadastrar!';
    }
    
?>