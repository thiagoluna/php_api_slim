# php_api_slim
API using Slim Framework

API developed using Slim Framework with libraries installed by composer (Illuminate, JWT, tuupola)
- Install Illuminate
composer require illuminate/database
- Install JWT (https://github.com/firebase/php-jwt)
composer require firebase/php-jwt
- Install tuupola (https://github.com/tuupola/slim-jwt-auth)
composer require tuupola/slim-jwt-auth

2 middlewares
- JWT Authentication
- Access-Control-Allow-Headers

Database
db.php to create a database with tables by command prompt

Autoload
- composer.json configured to allow 2 models on App/Models

