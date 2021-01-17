<?php
include 'config.php';
session_start();
if (isset($_POST["submit"]) && $_POST["usename"] != '' && $_POST["password"] != '') {
    $username = $_POST["usename"];
    $password = $_POST["password"];
    $password = md5($password);
    $sql = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
    $user = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($user);
    if (mysqli_num_rows($user) > 0) {
        // if (isset($_SESSION['use'])) {
        //     //$_SESSION['use'] = "";
        //     $_SESSION['use'] = $data['username'];
        //     header("location:index.php");
        // } else {
        //     $_SESSION['use'] = $data['username'];
        //     header("location:index.php");
        // }
        echo $data;
    } else {
        echo "Dang nhap that bai";
    }
} else {
    header("location:login.php");
    //header("location:index.php");
}
?>
