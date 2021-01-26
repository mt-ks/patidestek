# PATI DESTEK
Sokak hayvanlarına yardım & sahiplendirme yapmayı amaçlayan
ege üniversitesi öğrencileri tarafından geliştirilen ücretsiz sosyal platform.


Require
composer: https://getcomposer.org/
git: https://git-scm.com/downloads


Linux installation / Windows : https://www.apachefriends.org/tr/index.html
PHP & PHP-Extensions Installation
```shell
sudo apt install php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath
```

Check php
```shell
php --version
PHP 7.4.3 (cli) (built: Mar 26 2020 20:24:23) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.3, Copyright (c), by Zend Technologies
```

Redis Installation : https://redis.io/download
```shell 
sudo apt-get install redis-server
```
Check Redis 
```shell
redis-cli
127.0.0.1:6379> ping
PONG
127.0.0.1:6379>
```

Install Composer & git & repo
```shell
sudo apt-get install composer
sudo apt-get install git
git clone https://github.com/mehmetbeyHZ/patidestek.git
cd patidestek
composer install 
```

Install Mysql
```shell
sudo apt update
sudo apt install mysql-server
sudo mysql_secure_installation
```

Create databases;
```shell
php artisan migrate
```

Run the app
```shell
php artisan serve
```

Database; 26.01.2021
<img src="https://i.hizliresim.com/fh0Q46.jpg">
