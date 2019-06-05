#!/bin/bash
#已通过unit-test 请勿更改
sh ./pre-install.sh
wget -O Info.tmp https://www.minecraft.net/en-us/download/server/bedrock/ >/dev/null 2>&1
grep -n "serverBedrockLinux" ./Info.tmp > ./Info.tmp1
echo $(sed -n "$(cut -f1 -d":" ./Info.tmp1)p" ./Info.tmp) > ./Info.tmp
Link=$(cut -f2 -d"\"" ./Info.tmp)
echo ${Link} > ./Info.tmp
echo $(cut -f4 -d"-" ./Info.tmp) > ./Info.tmp
Version=$(sed 's/.zip//g' ./Info.tmp)
echo ${Version} > ./Info.tmp
rm -rf ./Info.tmp*
sleep 1
mkdir $1
cd $1
wget -O bedrock-server-${Version}.zip ${Link}
unzip -o bedrock-server-${Version}.zip
