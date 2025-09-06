<?php 
include_once 'conexao.php';
include_once 'modeloPessoa.php';
include_once 'pessoa.classe.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nome = filter_input(INPUT_POST, 'txt_nome');
//     $cpf = filter_input(INPUT_POST, 'txt_cpf');
//     $telefone = filter_input(INPUT_POST, 'txt_tel');
//     $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

//     $pessoa = new Pessoa();
//     $_nome = $pessoa->setNome($nome);
//     $_cpf = $pessoa->setCpf($cpf);
//     $_tel = $pessoa->setTelefone($telefone);

//     $model = new ModelPessoa($conn);

//     if ($id) {
//         if ($model->update($id, $_nome, $_cpf, $_tel)) {
//             echo "$nome atualizado com sucesso!";
//         } else {
//             echo "Erro ao atualizar!";
//         }
//     } else {
//         if ($model->create($_nome, $_cpf, $_tel)) {
//             echo "$nome cadastrado com sucesso!";
//         } else {
//             echo "Erro ao cadastrar!";
//         }
//     }

//     echo '<br><a href="cadastro.html" class="btn-ver-mais">Voltar</a>';
// }

    
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
            <button type="submit" name="exibir" id="voltar">Exibir Registros</button>
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
                echo "<td>
                        <a href='cadastro.php?id=" . $linha['id_pessoa'] . "'>Editar</a>
                        <a href='atualizacao.php?id=" . $linha['id_pessoa'] . "'>Excluir</a>
                    </td>";
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
?>
?>
