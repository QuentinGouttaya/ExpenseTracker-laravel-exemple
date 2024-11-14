#!/bin/bash

echo "WWW_USER=$(id -u)" >>.env

docker compose up --build
