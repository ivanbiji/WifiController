#!/bin/sh

#  Script.sh
#
#  Created by IVAN BIJI.
#  Copyright © 2018 IVAN BIJI. All rights reserved.


PKG_OK=$(dpkg-query -W --showformat='${Status}\n' android-tools-adb|grep "install ok installed")
if [ "" == "$PKG_OK" ]; then
    echo "====================================="
    echo "ADB not installed, installing ADB now"
    echo "====================================="

    sudo add-apt-repository ppa:phablet-team/tools
    sudo apt-get update
    sudo apt-get --force-yes --yes install android-tools-adb
fi

PKG_OK=$(dpkg-query -W --showformat='${Status}\n' linus-headers-$(uname -r)|grep "install ok installed")
if [ "" == "$PKG_OK" ]; then
    echo "========================================================="
    echo "Linux headers not installed, installing linux headers now"
    echo "========================================================="

    sudo apt-get install linus-headers-$(uname -r)
fi

PKG_OK=$(dpkg-query -W --showformat='${Status}\n' build-essential|grep "install ok installed")
if [ "" == "$PKG_OK" ]; then
    echo "=========================="
    echo "Building essential headers"
    echo "=========================="

    sudo apt-get install build-essential
fi

echo "============="
echo "Making module"
echo "============="

cd os
sudo rmmod imouse.ko
make
sudo insmod imouse.ko
make clean

echo "================"
echo "Compiling client"
echo "================"

gcc layer.c

echo "=============="
echo "Client Started"
echo "=============="

sudo ./a.out
sudo rmmod imouse.ko

