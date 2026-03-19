#!/bin/bash
SITE_ROOT="$1"

find "$SITE_ROOT" -name "*.html" | while read -r file; do
    echo "tidied up: $file"
    tidy -mi -utf8 --show-errors 0 "$file" 2>/dev/null || true
done
