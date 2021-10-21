<?php
Class Usuario{
    private $pdo;
    public $msgErro = "";//ok

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try{
            $pdo = new PDO("mysql:mydbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e){            
            $msgErro = $e->getMessage();            
        }   

    }
    public function cadastrar($nome, $email, $senha){
        global $pdo;
        //Verificar se já existe email cadastrado
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e", $email);
            $sql->execulte();
             //já tem cadastro no banco de dados
            if($sql->rowCount() > 0){
                return false;
            }
            //caso não, cadastrar
            else{
                $sql = $pdo->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (:n, e:, s:)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execulte();
                return true;
            }         
    }
    public function logar($email, $senha){
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->preprare("SELECT id_usurario FROM usuarios WHERE email = e: AND s:");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execulte();
        if($sql->rowCount()> 0){
        //entrar no sistema(sessao)
        $dado = $sql->fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario'];
        return true; //Logado com sucesso
        }else{
                return false; //nao foi possivel logar
        }   



    }
}





?>