<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>

    <?php
        include_once "conexao.php";

        $id =$_GET['id'] ?? '';
        $sql = "SELECT * FROM pessoa WHERE id_pessoa = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <a href="cadastro.html" id="voltar">Voltar</a>
    
    <form action="atualização.php" method="post">
        <h1>Alteração de cadastro</h1>

        <div class="form-group">
            <Label for="name">Nome completo :</Label>
            <input type="text" name="txt_nome" id="txt_nome" required VALUE="<?php echo $pessoa['nome_pessoa']; ?>">
            
        </div>
        <div class="form-group">
            <Label for="name">CPF:</Label>
            <input type="text" name="txt_cpf" id="txt_cpf" minlength="11" maxlength="11" required VALUE="<?php echo $pessoa['cpf_pessoa']; ?>">
        </div>

        <div class="form-group">
            <Label for="name">Telefone:</Label>
            <input type="text" name="txt_tel" id="txt_tel" minlength="14" maxlength="15" required VALUE="<?php echo $pessoa['telefone_pessoa']; ?>">
        </div>

        <div class="btn">
            <input type="submit" value="Alterar" class="primary">
            <input type="hidden" name="id_pessoa" value="<?php echo $pessoa['id_pessoa']; ?>">
        </div>
    </form>
    
</body>
</html>