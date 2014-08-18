#!/bin/bash
wget -q http://br.wordpress.org/latest-pt_BR.tar.gz
tar -zxvf latest-pt_BR.tar.gz && rm -f latest-pt_BR.tar.gz

sudo mv wordpress/* /var/www/blog/ && rm -rf wordpress/
sudo mv /home/vagrant/.wp-config.php /var/www/blog/wp-config.php
sudo ln -s /vagrant /var/www/blog/wp-content/themes/phpsp

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

sudo -u vagrant -H /bin/bash - << eof

#Composer Install
echo '[Install] Composer Global Install'
composer global install -n --prefer-source --no-interaction

eof

sudo /home/vagrant/.composer/vendor/bin/phing \
    -Dplugindir=/var/www/blog/wp-content/plugins/ \
    -f /var/www/blog/wp-content/themes/phpsp/build.xml

chown www-data:www-data -R /var/www/blog/*
find /var/www/blog/* -type d -exec chmod 755 {} \;
find /var/www/blog/* -type f -exec chmod 644 {} \;