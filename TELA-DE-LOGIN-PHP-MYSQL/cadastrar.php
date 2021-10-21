<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>TELA DE LOGIN</title>
</head>
<body>
    <div id="corpo-form">
        <h1>Cadastrar</h1>
        <form method="post">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="passaword" name="senha" placeholder="Senha" maxlength="15">
            <input type="passaword" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
            <a href="index.php">Já tem cadastro! <strong>Faça Login!</strong></a>
        </form>
    </div>
    <?php
        //verifica se clicou no botao
        if(isset($_POST['nome'])){

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarsenha = addslashes($_POST['confsenha']);
            //verificar se tudo esta preenchido
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarsenha)){

                $u->conectar("cadastro_usuario","localhost","root","");
                    //se esta tudo ok
                if($u->msgErro == ""){

                    if($senha == $confirmarsenha){

                    if($u->cadastrar($nome, $email, $senha)){
                        echo "Cadastrado com sucesso! Faça login para entrar!";

                    }else{
                            echo "E-mail já cadastrado!";
                    }

                    }else{
                        echo "Senha e confirmar senha não correspodem";
                    }
                }
                else{
                   echo "Erro: ". $u->msgErro; 
                }
                

            }else{
                echo "Preencha todos os campos!";
            }
        }

    

            
        
        
        
    ?>
</body>
</html>