FROM mysql:8

ADD mysql/db-init.sql /docker-entrypoint-initdb.d/