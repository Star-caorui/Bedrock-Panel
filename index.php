<?php
//引入配置文件
include "config.php";


//安装检测
if ($install != "true") {
    header('Location: install.php');
}
else {


//登录检测
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
  <h2 class="aui-bar">Minecraft 网页控制后台</h2> 
  <div class="aui-content aui-margin-b-15"> 
   <ul class="aui-list aui-list-in"> 
    <li class="aui-list-header">服务器状态</li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-label-icon"> 
      <i class="aui-iconfont aui-icon-<?php /* 预留，代码一会补全 */ ?>"></i> 
     </div> 
     <div class="aui-list-item-inner"> 
        <?php echo $user_in?>
      <!--?php
	$status = "mcchk -status ".$screen;
        $cmd = system($status);
        if ($cmd="0")
{
    echo "服务器未开启";
}
else
{
    echo "服务器已开启";
}
	?--> 
     </div> </li> 
    <li class="aui-list-item">
     <div class="aui-list-item-label-icon">
      <i class="aui-iconfont aui-icon-edit"></i>
     </div>
     <div class="aui-list-item-inner">
       服务器IP/域名:<?php echo $ip;?>
     </div></li>
    <li class="aui-list-item"> 
     <div class="aui-list-item-label-icon"> 
      <i class="aui-iconfont aui-icon-camera"></i> 
     </div> 
     <div class="aui-list-item-inner">
       IPv4端口:
      <?php echo $port; ?> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-label-icon"> 
      <i class="aui-iconfont aui-icon-camera"></i> 
     </div> 
     <div class="aui-list-item-inner">
       CPU:
      <div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: 60%;"></div> 
      </div> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-label-icon"> 
      <i class="aui-iconfont aui-icon-camera"></i> 
     </div> 
     <div class="aui-list-item-inner">
       内存:
      <div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: 60%;"></div> 
      </div> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-label-icon"> 
      <i class="aui-iconfont aui-icon-camera"></i> 
     </div> 
     <div class="aui-list-item-inner">
       硬盘:
      <div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: 60%;"></div> 
      </div> 
     </div> </li> 
   </ul> 
  </div>   
 </body>
</html>
