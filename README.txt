Instrucciones para ejecutar el proyecto:

1.- Instalar composer en la carpeta backend
2.- Luego de haber instalado composer, es necesario ir a la ruta base del proyecto backend, y en la consola, ejecutar el comando composer install
3.- Una vez finalice, se ejecuta el comando php yii serve, para iniciar el servidor (NOTA: El proyecto debe de correr en el puerto 8080)
4.- Luego se puede dar click en cualquiera de los archivos html en la carpeta frontend, para verificar que el sistema se haya conectado bien

Instrucciones para ejecutar las pruebas:

1.-Ir a la ruta base del proyecto backend, y en la consola ejecutar el comando  php yii serve
2.- Luego de eso, iniciar otra consola, y ejecutar el comando composer require --dev phpunit/phpunit ^8 para verificar que se tenga instalado en phpunit
3.- Finalmente, cuando se terminen de descargar las librerías, ejecutar el comando ./vendor/bin/phpunit tests
