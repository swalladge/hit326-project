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

echo "Connecting to Spinetail - you may need to enter a password"

# connect, remove public_html folder, push the local director, symlink
# this makes it an atomic operation, at the expense of some short downtime
# while uploading the changes
lftp -f <(cat << EOF
connect sftp://cdunit@cdunits.spinetail.cdu.edu.au
cd /home/cdunit
rm -r public_html
mirror -v -R -e -c "$TARGET" hit326-project
ln -s hit326-project/webroot public_html
EOF
)

# finally, install all the dependencies locally again to pull in dev deps
composer install -q
