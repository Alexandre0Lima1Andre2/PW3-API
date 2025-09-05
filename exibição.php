<?php
include_once 'modeloPessoa.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição</title>
</head>
<body>
    <?php
    $model = new ModelPessoa($conn);
    $pessoas = $model->readAll();
    if ($pessoas) {
        echo "<h1>Lista de Pessoas Cadastradas</h1>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                </tr>";
        foreach ($pessoas as $pessoa) {
            echo "<tr>
                    <td>{$pessoa['id_pessoa']}</td>
                    <td>{$pessoa['nome_pessoa']}</td>
                    <td>{$pessoa['cpf_pessoa']}</td>
                    <td>{$pessoa['telefone_pessoa']}</td>
                    <td>
                        <a href='cadastro.php?id={$pessoa['id_pessoa']}'>Editar</a>
                        <a href='atualizacao.php?id={$pessoa['id_pessoa']}'>Excluir</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhuma pessoa cadastrada.</p>";
    }
    ?>
</body>
</html>