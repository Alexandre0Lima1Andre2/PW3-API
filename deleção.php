<?php
include_once 'modeloPessoa.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>
<body>
    <h1>Deletar Pessoa</h1>
    <form action="deleção.php" method="post">
        <label for="id">ID da Pessoa:</label>
        <input type="number" name="id" id="id" required>
        <input type="submit" value="Deletar">
        <?php
        if(isset($_POST["id"])){
            $id = filter_input(INPUT_POST, 'id');
            if($id){
                $model = new ModelPessoa($conn);
                if($model->delete($id)){
                    echo "<p>Pessoa com ID $id deletada com sucesso!</p>";
                } else {
                    echo "<p>Erro ao deletar pessoa com ID $id.</p>";
                }
            } else {
                echo "<p>ID inválido.</p>";
            }
        }
        ?>
    </form>
    <br>
    <a href="cadastro.html" class="btn-ver-mais">Voltar</a>
</body>
</html>