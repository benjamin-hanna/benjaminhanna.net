#!/bin/bash
SITE_ROOT="$1"

mkdir -p "${SITE_ROOT}"
rsync -avz deploy-server:/etc/httpd.conf "${SITE_ROOT}/httpd.conf"