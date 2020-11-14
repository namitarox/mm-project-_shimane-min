#! /bin/bash

export $(cat .env | xargs)

# docker-start
docker-compose -p $APP_NAME up -d