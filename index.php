<?php 
include "config.php";
if ($install != "true") {
    header('Location: install.php');
}
session_start();
$user_in = $_SESSION['user'];
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    echo "<script language=\"JavaScript\">alert(\"欢迎 {$user_in} 登入后台！\");</script>";
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1,minimum-scale=1,user-scalable=0,width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
<link rel="stylesheet" type="text/css" href="./css/api.css">
<link rel="stylesheet" type="text/css" href="./css/aui.2.0.css">
<link rel="stylesheet" type="text/css" href="./css/aui.css">
<link rel="stylesheet" type="text/css" href="./css/aui-flex.css">
<link rel="stylesheet" type="text/css" href="./css/aui-pull-refresh.css">
<link rel="stylesheet" type="text/css" href="./css/aui-skin.css">
<link rel="stylesheet" type="text/css" href="./css/aui-slide.css">
<script type="text/javascript" src="./script/api.js" ></script>
<script type="text/javascript" src="./script/aui-actionsheet.js" ></script>
<script type="text/javascript" src="./script/aui-collapse.js" ></script>
<script type="text/javascript" src="./script/aui-dialog.js" ></script>
<script type="text/javascript" src="./script/aui-lazyload.js" ></script>
<script type="text/javascript" src="./script/aui-list-swipe.js" ></script>
<script type="text/javascript" src="./script/aui-list-swipe-backupt.js" ></script>
<script type="text/javascript" src="./script/aui-popup.js" ></script>
<script type="text/javascript" src="./script/aui-popup-new.js" ></script>
<script type="text/javascript" src="./script/aui-pull-refresh.js" ></script>
<script type="text/javascript" src="./script/aui-range.js" ></script>
<script type="text/javascript" src="./script/aui-scroll.js" ></script>
<script type="text/javascript" src="./script/aui-sharebox.js" ></script>
<script type="text/javascript" src="./script/aui-skin.js" ></script>
<script type="text/javascript" src="./script/aui-slide.js" ></script>
<script type="text/javascript" src="./script/aui-tab.js" ></script>
<script type="text/javascript" src="./script/aui-toast.js" ></script>
</head>
<body>
<header class="aui-bar aui-bar-nav " id="header">
<h1>Minecraft Bedrock Edition Server Web Control Center</h1>
</header>
<div class="aui-content-padded" style="margin:0 auto;width:75%;height:100%">
<br>
	<h2 class="aui-bar">Minecraft 网页控制后台</h2>

	
		

<div class="aui-content aui-margin-b-15">
    <ul class="aui-list aui-list-in">
        <li class="aui-list-header">服务器状态</li>
        <li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-<?php
	$status = "mcchk -status ".$screen;
        $cmd = system($status);
        if ($cmd="0")
{
    echo "close";
}
else
{
    echo "correct";
}
	?>"></i>
            </div>
            <div class="aui-list-item-inner">
                <?php
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
	?>
					
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-edit"></i>
            </div>
            <div class="aui-list-item-inner">
                服务器IP/域名:<?php echo $_SERVER['SERVER_ADDR']; ?>
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-camera"></i>
            </div>
            <div class="aui-list-item-inner">
                IPv4端口:<?php echo $port; ?>
            </div>
        </li>
		<li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-camera"></i>
            </div>
            <div class="aui-list-item-inner">
                CPU:<div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%">
        <div class="aui-progress-bar" style="width: 60%;" ></div>
    </div>
            </div>
        </li>
		<li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-camera"></i>
            </div>
            <div class="aui-list-item-inner">
                内存:<div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%">
        <div class="aui-progress-bar" style="width: 60%;" ></div>
    </div>
            </div>
        </li>
		<li class="aui-list-item">
            <div class="aui-list-item-label-icon">
                <i class="aui-iconfont aui-icon-camera"></i>
            </div>
            <div class="aui-list-item-inner">
                硬盘:<div class="aui-progress aui-progress-sm" style="margin:0 auto;width:75%">
        <div class="aui-progress-bar" style="width: 60%;" ></div>
    </div>
            </div>
        </li>
    </ul>
</div>


	

</div>
<script type="text/javascript">
    apiready = function(){
        api.parseTapmode();
    }
    var toast = new auiToast({
    })
    function showDefault(type){
        switch (type) {
            case "success":
                toast.success({
                    title:"提交成功",
                    duration:2000
                });
                break;
            case "fail":
                toast.fail({
                    title:"提交失败",
                    duration:2000
                });
                break;
            case "custom":
                toast.custom({
                    title:"提交成功",
                    html:'<i class="aui-iconfont aui-icon-laud"></i>',
                    duration:2000
                });
                break;
            case "loading":
                toast.loading({
                    title:"加载中",
                    duration:2000
                },function(ret){
                    console.log(ret);
                    setTimeout(function(){
                        toast.hide();
                    }, 3000)
                });
                break;
            default:
                // statements_def
                break;
        }
    }

</script>
</body>
</html>
