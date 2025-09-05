<?php
    include_once "conexao.php";
    include_once "modeloPessoa.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
    <form action="atualização.php" method="post">

        <h1>Atualizar Cadastro</h1>
        <label for="id">ID da Pessoa:</label>
        <input type="number" name="id" id="id" required>
        <div>
            <Label for="name">Nome completo :</Label>
            <input type="text" name="txt_nome" id="txt_nome" required>
            
        </div>
        <div>
            <Label for="name">CPF:</Label>
            <input type="text" name="txt_cpf" id="txt_cpf" minlength="11" maxlength="11" required>
        </div>

        <div>
            <Label for="name">Telefone:</Label>
            <input type="text" name="txt_tel" id="txt_tel" minlength="14" maxlength="15" required>
        </div>
        <div>
            <input type="submit" value="Cadastrar">
        </div>

        <?php
        if(isset($_POST["id"],$_POST["txt_nome"],$_POST["txt_cpf"],$_POST["txt_tel"])){
            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'txt_nome');
            $cpf = filter_input(INPUT_POST, 'txt_cpf');
            $telefone = filter_input(INPUT_POST, 'txt_tel');
        }
            
            $model = new ModelPessoa($conn);
            if($model->update($id, $nome, $cpf, $telefone)){
                echo "Cadastro atualizado com sucesso!";
            }else{
                echo "Erro ao atualizar cadastro.";
            }
        ?>
    </form>
</body>
</html>