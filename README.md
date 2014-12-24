#Vagrant using docker to setting Apache + Mysql in container

Its simple web service with Apache + MySQL
Create 2 container inside docker-host

1. db

2. apache

##Usage
`vagrant up`

curl http://localhost:10080

##Share floder

1. (Mac)./app ~ (docker-host)/vargrant-app ~ (apache)/app

modify code its will update automatically

2. (Mac)./log ~ (docker-host)/vargrant-log ~ (apache)/var/log/apache2

export log from container to PC

3. (Mac)./log ~ (docker-host)/vargrant-log/mysql ~ (db)/var/log/mysql

mysql log

4. (Mac)./data ~ (docker-host)/vargrant-data/mysql ~ (db)/var/lib/mysql

persitant mysql data. 

3 and 4 not working

## Command

`vagrant ssh` ssh to docker-host

`docker ps` to check running container
