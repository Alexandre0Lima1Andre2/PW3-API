<?php

    if(isset($_POST['txt_email'],$_POST['txt_nome']) && !empty($_POST['txt_cpf']) && !empty($_POST['txt_tel'])){
        $email=$_POST['txt_nome'];
        $senha=$_POST['txt_cpf'];
        $senha=$_POST['txt_tel'];
        header('Location:api.php');
    }else{
        header('Location:api.html');
    }
?>