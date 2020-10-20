<?php
    require_once('pdo.php');
    $email=htmlentities($_POST['email']);
    $password=htmlentities($_POST['password']);
    $stmt=$pdo->prepare('insert into signup(email,password) values(:email,:password)');
    $stmt->execute(array(':email'=>$email,':password'=>$password));
    session_start();
    $_SESSION['email']=$email;
    header('Location: testor.php');
?>