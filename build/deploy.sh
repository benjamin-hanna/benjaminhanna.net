#!/bin/bash
SITE_ROOT="$1"
rsync -av --delete "${SITE_ROOT}/" deploy-server:/var/www/htdocs/www.benjaminhanna.net/
