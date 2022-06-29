#!/bin/bash

set -eux

SCRIPT_DIR=$(cd $(dirname $0); pwd)

DATA_FILES="${SCRIPT_DIR}/../htdocs/keijiban.html ${SCRIPT_DIR}/../logs/log.txt"
mkdir -p ${SCRIPT_DIR}/../logs
touch ${DATA_FILES} && chmod 666 ${DATA_FILES}

docker-compose -f ${SCRIPT_DIR}/docker-compose.yml up --build -d