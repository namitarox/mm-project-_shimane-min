#! /bin/bash

export $(cat .env | xargs)

# Export data bases
docker exec -i $APP_NAME-mysql mysql -uroot -proot $DB_NAME < ./db_data/mysql.dump.sql;