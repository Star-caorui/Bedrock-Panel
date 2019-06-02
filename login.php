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
if (isset($_POST['user'])) {
if ($user_in == $user && $password_in == $password) {
$_SESSION['user'] = $user;
header('location:index.php');
}else{
header('refresh:0;url=login.php');
echo "<script>alert('登录失败，用户名或密码不正确');</script>";

exit;}
}
}


//引入头部文件
include "head.php";
?>

   <h2>正在等待登录</h2>
   <p>我们需要收集一些信息来继续</p>
   <br />
   <div class="aui-content aui-margin-b-15">
    <form method="post">
     <ul class="aui-list aui-form-list">
      <li class="aui-list-header">服主&gt;管理&gt;审核</li>
      <li class="aui-list-item">
       <div class="aui-list-item-inner">
        <div class="aui-list-item-input">
         <input type="text" name="user" placeholder="用户名" />
        </div>
       </div></li>
      <li class="aui-list-item">
       <div class="aui-list-item-inner">
        <div class="aui-list-item-input">
         <input type="password" name="password" placeholder="密码" />
        </div>
       </div></li>
      <div class="aui-content-padded">
       <input class="aui-btn aui-btn-block aui-btn-info" type="submit" value="我已确认" />
      </div>
     </ul>
    </form>
   </div>
  </div>
 </body>
</html>
