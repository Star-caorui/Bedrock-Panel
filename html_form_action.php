<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="maximum-scale=1,minimum-scale=1,user-scalable=0,width=device-width,initial-scale=1"><meta name="format-detection" content="telephone=no,email=no,date=no,address=no"><link rel="stylesheet" type="text/css" href="./css/aui.2.0.css"></head><body><header class="aui-bar aui-bar-nav header" id="header"><h1>Minecraft Bedrock Edition Server Web Control Center</h1></header><div class="aui-content-padded" style="margin:0 auto;width:75%;height:100%"><br><h2>
<?php
$user = '$user="' . $_POST['user'] . "\";\n";
$password = '$password="' . $_POST['password'] . "\";\n";
$server_name = '$server_name="' . $_POST['server_name'] . "\";\n";
$screen = '$screen="' . $_POST['screen'] . "\";\n";
$install = '$install="true' . "\";\n";
$config = fopen('config.php', "a+");
$pwd = $_SERVER['DOCUMENT_ROOT'];
//w是写入模式，文件不存在则创建文件写入。
$write_config = fwrite($config, '<?php' . "\n" . $user . $password . $server_name . $screen . $install . '?>' . "\n");
if ($write_config) {
    echo "安装已完成-正在清除安装环境。</h2>";
    unlink('install.php');
    unlink('html_form_action.php');
    header('Location: index.php');
} else {
    echo "安装未完成-正在检查解决方案。</h2>";
    echo "<p>请以Root身份执行以下命令</p>";
    echo "<p>chmod -R 777 " . $pwd . "</p>";
}
?>
<br><div class="aui-content aui-margin-b-15"></div></h2></div></body></html>