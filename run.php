<?php
//引入配置文件
include "config.php";


//安装检测
if ($install != "true") {
    header('Location: install.php');
}
else {


//登录检测
$user_in = $_POST['user'];
$password_in = $_POST['password'];
session_start();
$user_in = $_SESSION['user'];
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
  echo "<script language=\"JavaScript\">alert(\"欢迎 {$user_in} 登入后台！\");</script>";
} else {
  header('Location: login.php');
}
}

//引入头部文件
include "head.php";
?>
