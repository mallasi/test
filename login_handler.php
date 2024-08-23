<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT id, password FROM users WHERE username=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows>0){
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)){
            session_start();
            $_SESSION['user_id']=$id;
            $_SESSION['username']=$username;
            header("Location: PLAY - hub.html");
            exit();
        } else{
            echo "Неправильный пароль.";
        }
    } else{
        echo "Пользователь не найден.";
    }

    $stmt->close();
}

$conn->close();
?>