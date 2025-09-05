<?php 
    include_once 'conexao.php';
    include_once 'modeloPessoa.php';
    include_once 'pessoa.classe.php';
    
    if(!isset($_POST["txt_email"],$_POST["txt_cpf"],$_POST["txt_tel"])){
        $nome = filter_input(INPUT_POST, 'txt_nome');
        $cpf = filter_input(INPUT_POST, 'txt_cpf');
        $telefone = filter_input(INPUT_POST, 'txt_tel');
        
        $pessoa = new Pessoa();
        $_nome = $pessoa->setNome($nome);
        $_cpf = $pessoa->setCpf($cpf);
        $_tel = $pessoa->setTelefone($telefone);

        $model = new ModelPessoa($conn);
        if($model->create($_nome,$_cpf,$_tel)){
            echo "$nome cadastrado com sucesso!";
        }
    }else{
        echo 'Não foi Possível cadastrar!';
    }
    echo '<br><a href="cadastro.html" class="btn-ver-mais">Voltar</a>';
?>