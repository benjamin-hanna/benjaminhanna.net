#!/bin/bash
SITE_ROOT="$1"
TARGET="${2:-all}"

case "$TARGET" in
    posts)
        rsync -av --delete "${SITE_ROOT}/posts" deploy-server:/var/www/htdocs/www.benjaminhanna.net/public/posts/ ;;
    all)
        rsync -av --delete "${SITE_ROOT}/" deploy-server:/var/www/htdocs/www.benjaminhanna.net/public/ ;;
    *)
        echo "Unknown deploy target: $TARGET" >&2
        exit 1
        ;;
esac