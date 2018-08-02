#!/usr/bin/sh
servertime=$(date +%s)
curl -v http://rfselcyqemtp3wgu.onion -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:52.0) Gecko/20100101 Firefox/52.0' --socks5-hostname 127.0.0.1:9050 &>> /root/rfselcyqemtp3wgu.onion/${servertime}.log
