<?php
    include_once "conexao.php";
    include_once "modeloPessoa.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
    <form action="" method="post">
        <h1>Atualizar Cadastro</h1>
        <div>
            <label for="id">ID da Pessoa:</label>
            <input type="number" name="id" id="id" required>
        </div>

        <div>
            <Label for="name">Nome completo :</Label>
            <input type="text" name="txt_nome" id="txt_nome">
        </div>

        <div>
            <Label for="name">CPF:</Label>
            <input type="text" name="txt_cpf" id="txt_cpf" minlength="11" maxlength="11">
        </div>

        <div>
            <Label for="name">Telefone:</Label>
            <input type="text" name="txt_tel" id="txt_tel" minlength="14" maxlength="15">
        </div>

        <div>
            <input type="submit" value="Cadastrar">
        </div>

        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'txt_nome');
            $cpf = filter_input(INPUT_POST, 'txt_cpf');
            $telefone = filter_input(INPUT_POST, 'txt_tel');

            if($id){
                $model = new ModelPessoa($conn);
                if($model->update($id, $nome, $cpf, $telefone)){
                    echo "Atualização realizada com sucesso!";
                } else {
                    echo "Erro ao atualizar o cadastro.";
                }
            }else{
                echo "ID inválido";
            }
        }
            
        ?>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'txt_nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, 'txt_cpf', FILTER_SANITIZE_NUMBER_INT);
        $telefone = filter_input(INPUT_POST, 'txt_tel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        
        if ($id && $nome && $cpf && $telefone) {
            $model = new ModelPessoa($conn);
            if ($model->update($id, $nome, $cpf, $telefone)) {
                echo "<p>Cadastro atualizado com sucesso!</p>";
            } else {
                echo "<p>Erro ao atualizar cadastro.</p>";
            }
        } else {
            echo "<p>Preencha todos os campos corretamente.</p>";
        }
    }
    ?>
</body>
</html>
