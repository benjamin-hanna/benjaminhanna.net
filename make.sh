#!/bin/bash
set -e
SITE_ROOT="$HOME/Sync/Projects/Octopus"

php "$SITE_ROOT/build/build.php"
bash "$SITE_ROOT/build/tidy.sh" "$SITE_ROOT/public"
bash "$SITE_ROOT/build/deploy.sh" "$SITE_ROOT/public"
