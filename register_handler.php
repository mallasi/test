<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql_check="SELECT * FROM users WHERE username=? OR email=?";
    $stmt_check=$conn->prepare($sql_check);
    $stmt_check->bind_param("ss",$username,$email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows>0){
        echo "Пользователь с таким именем или email уже существует.";
    } else{
        $sql="INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()){
            header("Location: login.php");
            exit();
        } else{
            echo "Ошибка регистрации.";
        }

        $stmt->close();
    }

    $stmt_check->close();
}

$conn->close();
?>