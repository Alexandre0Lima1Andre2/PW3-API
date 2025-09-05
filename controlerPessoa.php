<?php 
    include_once 'conexao.php';
    include_once 'modeloPessoa.php';
    include_once 'pessoa.classe.php';
    
    if(isset($_POST["txt_nome"],$_POST["txt_cpf"],$_POST["txt_tel"])){
        $nome = filter_input(INPUT_POST, 'txt_nome');
        $cpf = filter_input(INPUT_POST, 'txt_cpf');
        $telefone = filter_input(INPUT_POST, 'txt_tel');

        $pessoa = new Pessoa();
        $_nome = $pessoa->setNome($nome);
        $_cpf = $pessoa->setCpf($cpf);
        $_tel = $pessoa->setTelefone($telefone);

        $model2 = new ModelPessoa($conn);
        if($model2->create($_nome,$_cpf,$_tel)){
            echo "$nome cadastrado com sucesso!";
        }
    }
    echo '<br><br><a href="cadastro.html" class="btn-ver-mais">Voltar</a><br><br>';

    echo '<form method="post" action="">
            <button type="submit" name="exibir" class="btn-exibir">Exibir Registros</button>
      </form>';

      if (isset($_POST['exibir'])) {

        $model = new ModelPessoa($conn);
        $dados = $model->readAll(); 

        if ($dados) {
            echo "<h3>Lista de Pessoas:</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Id</th><th>Nome</th><th>CPF</th><th>Telefone</th></tr>";
            foreach ($dados as $linha) {
                echo "<tr>";
                echo "<td>" .$linha['id_pessoa'] . "</td>";
                echo "<td>" .$linha['nome_pessoa'] . "</td>";
                echo "<td>" . $linha['cpf_pessoa'] . "</td>";
                echo "<td>" . $linha['telefone_pessoa'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum registro encontrado.";
        }
    }

    echo '<form method="post" action="">
    <br><br>
        <Label for="id_pessoa">ID da Pessoa:</Label>
        <input type="number" name="id_pessoa" placeholder="Digite o ID para deletar" required>
        <button type="submit" name="deletar" class="btn-deletar">Deletar Registro</button>
      </form>';

        if (isset($_POST['deletar'])) {
            $id = filter_input(INPUT_POST, 'id_pessoa', FILTER_SANITIZE_NUMBER_INT);
            if ($id) {
                $model = new ModelPessoa($conn);
                if ($model->delete($id)) {
                    echo "Registro com ID $id deletado com sucesso.";
                } else {
                    echo "Erro ao deletar o registro com ID $id.";
                }
            } else {
                echo "ID inválido.";
            }
        }

    
    echo '<form method="post" action="atualização.php">
    <br><br>
        <button type="submit" name="atualizar" class="btn-atualizar">Atualizar Registro</button>
      </form>';

 
if (isset($_POST['editar'], $_POST['id'])) {
    $id = $_POST['id'];
    $pessoa = $model->getById($id); // método que busca a pessoa pelo ID

    if ($pessoa) {
        echo "<h3>Editar Registro ID $id</h3>";
        echo "<form method='post'>
                <input type='hidden' name='id' value='{$pessoa['id_pessoa']}'>
                <label>Nome:</label>
                <input type='text' name='nome' value='{$pessoa['nome_pessoa']}'><br>
                <label>CPF:</label>
                <input type='text' name='cpf' value='{$pessoa['cpf_pessoa']}'><br>
                <label>Telefone:</label>
                <input type='text' name='telefone' value='{$pessoa['telefone_pessoa']}'><br>
                <button type='submit' name='atualizar'>Salvar Alterações</button>
              </form>";
    }
}
?>
