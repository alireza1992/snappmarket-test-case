This is a test case made by snappmarket tech team .
requirements :
PHP >= 7.2.5, 
BCMath PHP Extension, 
Ctype PHP Extension, 
Fileinfo PHP extension, 
JSON PHP Extension, 
Mbstring PHP Extension, 
OpenSSL PHP Extension, 
PDO PHP Extension, 
Tokenizer PHP Extension, 
XML PHP Extension, 
composer, 

installation :
git clone https://github.com/alireza1992/snappmarket-test-case.git

docker :
docker-compose up -d nginx php mysql phpmyadmin


unit test run command :
vendor/bin/phpunit tests/Unit/LoginTest.php 

for web register/login :
1-composer require laravel/ui
2-php artisan ui vue --auth

