<h2>
<?php
//引入头部文件
include "head.php";

$user = '$user="' . $_POST['user'] . "\";\n";
$password = '$password="' . $_POST['password'] . "\";\n";
$server_name = '$server_name="' . $_POST['server_name'] . "\";\n";
$screen = '$screen="' . $_POST['screen'] . "\";\n";
$install = '$install="true' . "\";\n";
$ip = '$ip=' . "file_get_contents('http://members.3322.org/dyndns/getip');\n";
$port= '$port=' . "file_get_contents('http://members.3322.org/dyndns/getip');\n";
$config = fopen('config.php', "a+");
$pwd = $_SERVER['DOCUMENT_ROOT'];
//w是写入模式，文件不存在则创建文件写入。
$write_config = fwrite($config, '<?php' . "\n" . $user . $password . $server_name . $screen . $install . $ip . $port . "\n");
if ($write_config) {
    echo "安装已完成-正在清除安装环境。</h2>";
    unlink('install.php');
    unlink('html_form_action.php');
    header('Location: index.php');
} else {
    echo "<h2>安装未完成-正在检查解决方案。</h2>";
    echo "<p>请以Root身份执行以下命令</p>";
    echo "<p>chmod -R 777 " . $pwd . "</p>";
}
?>

<br><div class="aui-content aui-margin-b-15"></div></h2></div></body></html>
