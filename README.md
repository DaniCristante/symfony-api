Basic docker enviroment with php 7.4 + its packages + composer, 
nginx and mysql 5.6

On the Makefile you can find the basic commands to build, run and stop
the docker containers.

To use Makefile commands just type Make and the command defined on the file.
e.g: Make up will run docker-compose up -d (as you can see on the Makefile)

If you want to change MYSQL username, database name, password... just modify
the mysql variables on the docker-compose yaml 