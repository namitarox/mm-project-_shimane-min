#! /bin/bash

export $(cat .env | xargs)


# Export data bases
docker volume rm ${APP_NAME}_db_data;