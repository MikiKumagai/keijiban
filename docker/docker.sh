#!/bin/bash

set -eux

SCRIPT_DIR=$(cd $(dirname $0); pwd)
NAME=keijiban
IMAGE_NAME=${NAME}-image
CONTAINER_NAME=${NAME}-container

DATA_FILES="${SCRIPT_DIR}/../keijiban.html ${SCRIPT_DIR}/../log.txt"
touch ${DATA_FILES} && chmod 666 ${DATA_FILES}

docker build -t ${IMAGE_NAME} -f ${SCRIPT_DIR}/Dockerfile .
docker run --rm \
    --name ${CONTAINER_NAME} \
    -p 80:80 \
    -v $(pwd):/var/www/html \
    ${IMAGE_NAME}