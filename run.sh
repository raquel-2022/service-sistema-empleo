#!/bin/bash

service mysql start
service mariadb start
service apache2 start

mysql -u root -proot < /docker-entrypoint-initdb.d/schema.sql

while true; do
    tail -f /var/log/apache2/*.log
    exit 0
done
