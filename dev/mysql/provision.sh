#!/bin/sh

cd /vagrant/dev/mysql

data=false

for cname in `docker ps --filter="name=errand-mysql" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = errand-mysql ]
    then
        docker stop $cname
        docker rm $cname
    fi

    if [ "$cname" = errand-mysql-data ]
    then
        data=true
    fi
done

if [ "$data" = false ]
then
    docker run --name errand-mysql-data -v /var/lib/mysql busybox
fi

docker build -t errand/mysql .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name errand-mysql \
       --hostname errand-mysql \
       -p 3306:3306 \
       --volumes-from errand-mysql-data \
       -e MYSQL_DATABASE=errand \
       -e MYSQL_USER=errand \
       -e MYSQL_PASSWORD=errand \
       -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
       errand/mysql \
       --character-set-server=utf8 \
       --collation-server=utf8_unicode_ci
