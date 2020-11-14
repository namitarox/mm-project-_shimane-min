#! /bin/bash

export $(cat .env | xargs)

# Export data bases
docker exec -it $APP_NAME-mysql sh -c "mysqldump $DB_NAME -u root -proot 2> /dev/null" > ./db_data/mysql.dump.sql;