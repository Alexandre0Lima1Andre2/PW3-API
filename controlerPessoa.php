<?php 
include_once 'conexao.php';
include_once 'modeloPessoa.php';
include_once 'pessoa.classe.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'txt_nome');
    $cpf = filter_input(INPUT_POST, 'txt_cpf');
    $telefone = filter_input(INPUT_POST, 'txt_tel');
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    $pessoa = new Pessoa();
    $_nome = $pessoa->setNome($nome);
    $_cpf = $pessoa->setCpf($cpf);
    $_tel = $pessoa->setTelefone($telefone);

    $model = new ModelPessoa($conn);

    if ($id) {
        if ($model->update($id, $_nome, $_cpf, $_tel)) {
            echo "$nome atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar!";
        }
    } else {
        if ($model->create($_nome, $_cpf, $_tel)) {
            echo "$nome cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    echo '<br><a href="cadastro.html" class="btn-ver-mais">Voltar</a>';
}
?>
