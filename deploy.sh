#!/bin/bash

# deploys the website to the server

TARGET="./deploy_files"
rm -rf "$TARGET"
mkdir "$TARGET"

# only install required deps for prod
rm -rf vendor
composer install --no-dev -q

# copy everything into the local target directory
rsync -a bin config index.php plugins src webroot vendor .htaccess "$TARGET/"

# copy the production config
(
    cd "${TARGET}/config"
    rm app.php
    rm app.default.php
    mv app.production.php app.php
)

echo "connecting to spinetail - you may need to enter password"

lftp -f <(cat << EOF
connect sftp://cdunit@cdunits.spinetail.cdu.edu.au
cd /home/cdunit
mirror -v -R -e -c "$TARGET" public_html
EOF
)
