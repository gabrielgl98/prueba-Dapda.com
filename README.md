Symfony 3.4 - php 5.6.31

Realizamos composer install y ponemos el nombre que queramos a la base de datos

Para instalar crear base de datos y ejecutar entities

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

Limpiar cache por si da errores extraños

php bin/console cache:clear
php bin/console cache:clear --env=prod

Abrir web desde localhost/......../prueba-Dapda.com/web/promocion

Si hay algún problema contactar conmigo: gabrielgarlo7@gmail.com
