sudo apt-get update
sudo aptitude safe-upgrade
sudo aptitude full-upgrade
sudo aptitude install build-essential
sudo apt-get install curl
sudo apt-get install apache2 apache2-threaded-dev php5 php5-dev php-pear php5-gd mysql-server-5.0 phpmyadmin postfix
sudo a2enmod rewrite
sudo a2dismod cgi
sudo a2dismod autoindex
sudo sed -i 's/memory_limit = .*/memory_limit = 128M/' /etc/php5/apache2/php.ini
sudo sed -i 's/upload_max_filesize = .*/upload_max_filesize = 128M/' /etc/php5/apache2/php.ini
sudo sed -i 's/post_max_size = .*/post_max_size = 128M/' /etc/php5/apache2/php.ini
sudo pecl install uploadprogress
sudo sed -i '/; extension_dir directive above/ a\
extension=uploadprogress.so' /etc/php5/apache2/php.ini
sudo dpkg-reconfigure tzdata
sudo sed -i 's/PermitRootLogin yes/PermitRootLogin no/' /etc/ssh/sshd_config
sudo sed -i 's/ServerSignature On/ServerSignature Off/' /etc/apache2/apache2.conf
sudo sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/sites-available/default
sudo pecl install apc
sudo sed -i '/; extension_dir directive above/ a\
extension=apc.so' /etc/php5/apache2/php.ini
sudo a2enmod expires
sudo a2enmod deflate
sudo sed -i 's/DEFLATE text\/html text\/plain text\/xml/DEFLATE text\/html text\/plain text\/xml text\/css text\/javascript application\/x-javascript/' /etc/apache2/mods-available/deflate.conf
sudo sed -i 's/query_cache_limit       = 1M/query_cache_limit       = 1M\
query_cache_type        = 1/' /etc/mysql/my.cnf
sudo /etc/init.d/apache2 force-reload
sudo /etc/init.d/ssh force-reload
sudo /etc/init.d/mysql force-reload
adduser admin
visudo 
add admin ALL=(ALL) ALL
adduser ftp
chgrp -R www-data /var/www
chown -R ftp /var/www
sudo chmod -R 2750 /var/www
# NOTE : "sudo chmod -R 2770" for files directories
sudo usermod -a -G www-data ftp