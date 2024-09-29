#!/bin/bash

# FTP credentials
HOST="ftpupload.net"
USER="if0_37410854"
PASS="009988Ppooii"
REMOTE_DIR="htdocs"
LOCAL_DIR="web"  # Current directory

# Uploading files
lftp -f "
open $HOST
user $USER $PASS
lcd $LOCAL_DIR
cd $REMOTE_DIR
mirror --reverse --delete --verbose
bye
"


curl -F "url=https://canserai-mousa.hf.space/index.php" https://api.telegram.org/bot8117101442:AAGk7yqcJAP4iExThDVLYK_rf8FzFEWb4NE/setWebhook
