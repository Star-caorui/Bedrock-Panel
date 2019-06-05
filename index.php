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
} else {
  header('Location: login.php');
}
}

//引入头部文件
include "head.php";


//声明变量
$head = 'http://';
$find_url = $head.$_SERVER['SERVER_NAME'].'/run.php?status=1&password='.$password;
$fkz=file_get_contents($find_url);

$str_meminfo = shell_exec('more /proc/meminfo');
$pattern_meminfo = "/(.+):\s*([0-9]+)/";
preg_match_all($pattern_meminfo, $str_meminfo, $out_meminfo);

$str_cpu = shell_exec('more /proc/stat');
$pattern_cpu = "/(cpu[0-9]?)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)/";
preg_match_all($pattern_cpu, $str_cpu, $out_cpu);

$n=0;

$total_all = ceil(100*(disk_total_space('/')-disk_free_space('/'))/disk_total_space('/'));

?>
  <h2 class="aui-bar">Minecraft 网页控制后台</h2> 
  <div class="aui-content aui-margin-b-15"> 
   <ul class="aui-list aui-list-in"> 
    <li class="aui-list-header">服务器状态</li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner"> 

<?php
if ($fkz!=0) {
  echo '服务器已开启';
} else {
  echo '服务器未开启';
}
?>


     </div> </li> 
    <li class="aui-list-item">
     <div class="aui-list-item-inner">
       IP/域名:<?php echo $ip;?>
     </div></li>
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
       IPv4端口:
      <?php echo $port; ?> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
       CPU:
      <div class="aui-progress aui-p服务器未开启
rogress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: <?php echo ceil((100*($out_cpu[1][$n]+$out_cpu[2][$n]+$out_cpu[3][$n])/($out_cpu[4][$n]+$out_cpu[5][$n]+$out_cpu[6][$n]+$out_cpu[7][$n])))."%"; ?>;"></div> 
      </div> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
       内存:
      <div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: 
<?php echo ceil((100*($out_meminfo[2][0]-$out_meminfo[2][1])/$out_meminfo[2][0]))."%"; ?>;"></div> 
      </div> 
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
       硬盘:
      <div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%"> 
       <div class="aui-progress-bar" style="width: <?php echo $total_all.'%'; ?>;"></div> 
      </div> 
     </div> </li> 
   </ul> 
  </div>   
<br />
 <div class="aui-content aui-margin-b-15"> 
   <ul class="aui-list aui-list-in"> 
    <li class="aui-list-header">快捷操作</li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner"> 
			<a href="/run.php?password=<?php echo $password; ?>&
<?php
if ($fkz!=0) {
  echo 'off';
} else {
  echo 'open';
}
?>
=1" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">
<?php
if ($fkz!=0) {
  echo '关闭服务器';
} else {
  echo '开启服务器';
}
?></a>


     </div> </li> 
    <li class="aui-list-item">
     <div class="aui-list-item-inner">
   	<a href="/run.php?password=<?php echo $password; ?>&backup=1" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">备份</a>
	<a href="/" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">回档</a>

    </div></li>
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
<form action="run.php?password=<?php echo $password; ?>&<?php echo $in; ?>=1" method="post">
<input type="text" name='str1' placeholder="Xbox ID">
<!--input type="text" name='str2' placeholder="原因:"-->
 </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
  <input type="submit" value="Submit" />
	<a href="/run.php?password=<?php echo $password; ?>&wa=1&str1=<?php echo $_GET["str1"]; ?>" type="submit" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">添加白名</a>
	<a href="/?find=1" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">查询玩家</a>
	<a href="/" class="aui-btn aui-btn-primary aui-btn-block aui-btn-outlined aui-btn-sm">移除白名</a>
</form>
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
       第五项
     </div> </li> 
    <li class="aui-list-item"> 
     <div class="aui-list-item-inner">
      第六项
     </div> </li> 
   </ul> 
  </div>   
 </body>
</html>
