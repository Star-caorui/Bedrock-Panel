<?php
//引入配置文件
include "config.php";


//变量接收
$password_in = $_GET["password"];
$open = $_GET["open"];
$off = $_GET["off"];


//身份判断
if (!isset($password_in)) {
    echo "403";
} elseif ($password_in != $password) {
echo "密码错误";
}
  else {
    //检测服务器模块
      if (!isset($open)) {
          echo "";
      } elseif ($open != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //启动服务器模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //关闭服务器模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //查询白名单模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //添加白名单模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //删除白名单模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //查询Ban模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //添加Ban模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //删除Ban模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //备份地图模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }

    //恢复地图模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          echo "is on";
      }
}

?>
