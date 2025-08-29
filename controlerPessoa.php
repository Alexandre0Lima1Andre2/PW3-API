<?php 

    if(isset($_POST['txt_email'],$_POST['txt_nome']) && !empty($_POST['txt_cpf']) && !empty($_POST['txt_tel'])){
        $nome=$_POST['txt_nome'];
        $cpf=$_POST['txt_cpf'];
        $tel=$_POST['txt_tel'];
        // header('Location:api.php');
        $host = 'localhost';
        $port="3306";
        $user="root";
        $senha="";
        $banco="Pessoa";

        try{
            $conn=new PDO('mysql:host='.$host.';
            port='.$port.';
            dbname='.$banco,
            $user,
            $senha
        );
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'ERROR'.$e->getMessege();
        }

    }else{
        header('Location:api.html');
    }


?>