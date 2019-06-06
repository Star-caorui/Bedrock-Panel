#!/bin/bash
#检测服务器状态
case $1 in
"-install")
if [ -L "/usr/local/bin/mcchk" ]; then
echo 0
exit
else
mv mcchk.sh /opt
chmod 777 /opt/mcchk.sh
ln -s /opt/mcchk.sh /usr/local/bin/mcchk
if grep -q www-data /etc/sudoers ; then
echo 1
exit
else
echo "www-data ALL=(ALL:ALL)  NOPASSWD:/usr/local/bin/mcchk" >> /etc/sudoers
echo 1
fi
fi
;;
"-status")
if [ -n "$2" ]; then
if screen -ls | grep -q "$2" ;then
echo 1
else
echo 0
fi
else
echo 0
fi
;;
#将存档推送到/var/www/html/downloads目录并设置好权限
"-backup")
cd /opt/mc/worlds/"Bedrock level"/
zip -q -r world_$(date "+%m%d").mcworld  ./*
mv world_$(date "+%m%d").mcworld /var/www/html/downloads
chmod 777 /var/www/html/downloads/*
if [ -f "/var/www/html/downloads/world_$(date "+%m%d").mcworld" ]; then
echo 1
else
echo 0
fi
;;
#将/var/www/html/uploads/里的存档文件恢复至服务器
"-restore")
if [ -f "/var/www/html/uploads/$2" ]; then
rm -rf /opt/mc/worlds/"Bedrock level"/*
mv /var/www/html/uploads/$2 /opt/mc/worlds/"Bedrock level"/world.zip
unzip -q -o /opt/mc/worlds/"Bedrock level"/world.zip
rm -rf /var/www/html/uploads/$2 /opt/mc/worlds/"Bedrock level"/world.zip
echo 1
else
echo 0
fi
;;
#返回服务器在线人数
#"-o")
#var=$(netstat -nat | grep -iw $2 | wc -l)
#if [ -n "$var" ]; then
#echo $var
#else
#echo 0
#fi
#;;
#添加白名单
"-wa")
screen -x -S $2 -p 0 -X stuff "whitelist add \"$3\" "
screen -x -S $2 -p 0 -X stuff "\n"
sleep 2s
if grep -q "$3" /opt/mc/whitelist.json ;then 
echo 0
else
echo 1
fi                        
;;
#移除白名单
"-wr")
screen -x -S $2 -p 0 -X stuff "whitelist remove \"$3\" "
screen -x -S $2 -p 0 -X stuff "\n"
sleep 2s
if grep -q "$3" /opt/mc/whitelist.json ;then 
echo 1
else
echo 0
fi
;;
#启动服务器
"-on")
screen -dmS "$2" /bin/bash -c "cd /opt/mc && ./bedrock_server | tee log.txt"
;;
#关闭服务器
"-off")
screen -x -S "$2" -p 0 -X stuff "stop"
screen -x -S "$2" -p 0 -X stuff "\n"
rm /opt/mc/log.txt
;;
#查询白名单
"-wquery")
if [ -n "$2" ]; then
if grep -q -w "$2" /opt/mc/whitelist.json ; then
echo 1
else
echo 0
fi
else
echo 0
fi
;;
"-update")
rm /opt/mcchk.sh
mv mcchk.sh /opt/
echo 1
;;
"-set")
sed -i 's/'$2'/'$3'/g' /var/www/html/config.php
if grep -q -w "$3" /var/www/html/config.php ; then
echo 1
else 
echo 0
fi
;;
"-cmd")
screen -x -S "$2" -p 0 -X stuff "$3"
screen -x -S "$2" -p 0 -X stuff "\n"
sleep 0.5s
str=$(cat /opt/mc/log.txt)
echo "$str"
cat /dev/null>/opt/mc/log.txt
;;
*)
echo "用法:"
echo "安装脚本:./mcchk.sh -install"
echo "更新脚本:./mcchk.sh -update"
echo "检查服务器状态:mcchk -status <screen窗口名>"
echo "将存档推送到/var/www/html/downloads目录并设置好权限:mcchk -backup"
echo "将/var/www/html/uploads/里的存档文件恢复至服务器:mcchk -restore <存档文件名>"
echo "将玩家加入白名单:mcchk -wa <screen窗口名> <\"玩家id\">"
echo "将玩家从白名单中移除:mcchk -wr <screen窗口名> <\"玩家id\">"
echo "开启服务器:mcchk -on <screen窗口名>"
echo "关闭服务器:mcchk -off <screen窗口名>"
echo "检测玩家是否在白名单中:mcchk -wquery <\"玩家名称\">"
echo "修改config.php内的常量:mcchk -set <要修改的常量值> <修改后的常量值>"
echo "注入指令:mcchk -cmd <screen窗口名> <\"指令\">"
esac
