#!/bin/bash

set -eux

SCRIPT_DIR=$(cd $(dirname $0); pwd)
NAME=keijiban
IMAGE_NAME=${NAME}-image
CONTAINER_NAME=${NAME}-container

docker build -t ${IMAGE_NAME}  -f ${SCRIPT_DIR}/Dockerfile .
docker run --rm \
    --name ${CONTAINER_NAME} \
    -p 80:80 \
    -v $(pwd)/keijiban:/var/www/html/keijiban \
    ${IMAGE_NAME}