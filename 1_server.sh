#!/bin/sh

#  Script.sh
#
#  Created by IVAN BIJI.
#  Copyright © 2018 IVAN BIJI. All rights reserved.


PKG_OK=$(dpkg-query -W --showformat='${Status}\n' ifconfig|grep "install ok installed")
if [ "" == "$PKG_OK" ]; then
    echo "=========================="
    echo "Installing Net-tools"
    echo "=========================="

    sudo apt-get install net-tools
fi

echo "============="
echo "Starting Server"
echo "============="

sudo systemctl stop apache2
sudo ifconfig
sudo php artisan serve --host 0.0.0.0 --port 80




