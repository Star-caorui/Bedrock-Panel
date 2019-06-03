<?php
//引入配置文件
include "config.php";


//变量接收
$password_in = $_GET["password"];

$status = $_GET["status"];
$open = $_GET["open"];
$off = $_GET["off"];
$wquery = $_GET["wquery"];
$wa = $_GET["wa"];
$wr = $_GET["wr"];
$backup = $_GET["wr"];
$restore = $_GET["wr"];

$str_1 = $_GET["str1"];
$str_2 = $_GET["str2"];


//身份判断
if (!isset($password_in)) {
    echo "403";
} elseif ($password_in != $password) {
echo "密码错误";
}
  else {
    //检测服务器模块
      if (!isset($status)) {
          echo "";
      } elseif ($status != '1') {
          echo "404";
      } else {
          system("sudo mcchk -status ".$screen);
      }

    //启动服务器模块
      if (!isset($open)) {
          echo "";
      } elseif ($open != '1') {
          echo "404";
      } else {
          system("sudo mcchk -on ".$screen);
      }

    //关闭服务器模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          system("sudo mcchk -off ".$screen);
      }

    //查询白名单模块
      if (!isset($wquery)) {
          echo "";
      } elseif ($wquery != '1') {
          echo "404";
      } else {
          system("sudo mcchk -wquery ".$screen);
      }

    //添加白名单模块
      if (!isset($wa)) {
          echo "";
      } elseif ($wa != '1') {
          echo "404";
      } else {
          system("sudo mcchk -wa ".$screen);
      }

    //删除白名单模块
      if (!isset($wr)) {
          echo "";
      } elseif ($wr != '1') {
          echo "404";
      } else {
          system("sudo mcchk -wr ".$screen);
      }

    //备份地图模块
      if (!isset($backup)) {
          echo "";
      } elseif ($backup != '1') {
          echo "404";
      } else {
          system("sudo mcchk -backup");
      }

    //恢复地图模块
      if (!isset($off)) {
          echo "";
      } elseif ($off != '1') {
          echo "404";
      } else {
          system("sudo mcchk -restore ".$str_1);
      }
}

?>
