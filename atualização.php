<?php
    include_once "conexao.php";
    include_once "modeloPessoa.php";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id_pessoa');
            $nome = filter_input(INPUT_POST, 'txt_nome');
            $cpf = filter_input(INPUT_POST, 'txt_cpf');
            $telefone = filter_input(INPUT_POST, 'txt_tel');

            if($id){
                $model = new ModelPessoa($conn);
                if($model->update($id,$nome, $cpf, $telefone)){
                    echo "Atualização realizada com sucesso!";
                } else {
                    echo "Erro ao atualizar o cadastro.";
                }
            }else{
                echo "ID inválido";
            }
        }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
        <link rel="stylesheet" href="style.css">
<body>
    <a href="cadastro.html" id="voltar">Voltar</a>
</body>
</html>
