<?php
include "config.php";
session_start();
if (isset($_POST['user'])) {
    $user_in = $_POST['user'];
    $password_in = $_POST['password'];
    if ($user_in == $user && $password_in == $password) {
        //验证正确
        setcookie("user", $user, time() + 3600 * 24);
        $_SESSION['user'] = $user;
        //跳转到首页
        header('location:index.php');
    } else {
        echo "<script>alert('登录失败，用户名或密码不正确');</script>";
        exit;
    }
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1,minimum-scale=1,user-scalable=0,width=device-width,initial-scale=1"><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><link rel="stylesheet" type="text/css" href="./css/aui.2.0.css"></head><body><header class="aui-bar aui-bar-nav header" id="header"><h1>Minecraft Bedrock Edition Server Web Control Center</h1></header><div class="aui-content-padded" style="margin:0 auto;width:75%;height:100%"><br><h2>正在等待登录</h2><p>我们需要收集一些信息来继续</p><br><div class="aui-content aui-margin-b-15"><form method="post"><ul class="aui-list aui-form-list"><li class="aui-list-header">服主>管理>审核</li><li class="aui-list-item"><div class="aui-list-item-inner"><div class="aui-list-item-input"><input type="text" name="user" placeholder="用户名"></div></div></li><li class="aui-list-item"><div class="aui-list-item-inner"><div class="aui-list-item-input"><input type="password" name="password" placeholder="密码"></div></div></li><div class="aui-content-padded"><input class="aui-btn aui-btn-block aui-btn-info" type="submit" value="我已确认"></div></ul></form></div></div></body></html>
