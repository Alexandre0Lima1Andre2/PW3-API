<?php 
    include_once 'modeloPessoa.php';
    include_once 'pessoa.classe.php';
    
    if(isset($_POST["txt_email"],$_POST["txt_cpf"],$_POST["txt_tel"])){
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