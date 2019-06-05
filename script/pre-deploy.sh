#!/bin/bash
#已通过unit-test 请勿更改
apt update

if [$(dpkg -l | grep "ii  wget")==""]
then
    apt-get install -y wget
fi

if [$(dpkg -l | grep "ii  curl")==""]
then
    apt-get install -y curl
fi

if [$(dpkg -l | grep "ii  screen")==""]
then
    apt-get install -y screen
fi

if [$(dpkg -l | grep "ii  zip")==""]
then
    apt-get install -y zip
fi

if [$(dpkg -l | grep "ii  unzip")==""]
then
    apt-get install -y unzip
fi

if [$(dpkg -l | grep "ii  openssl")==""]
then
    apt-get install -y openssl
fi
