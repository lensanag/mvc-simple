# mvc simple

Este repositorio se usa para exponer las caracteristicas de php a nivel basico mediante el patron MVC, no pretende ser un framework.

## Instalacion

Clonar el repositorio 
```bash
git clone https://github.com/lensanag/mvc-simple.git
```

* Alternativamente copiar el directorio a nuestro entorno de trabajo (xampp, wamp, laragon, etc).
* IMPORTANTE: La carpeta publica expone el index.php

## Uso
Ingresar al directorio y ejecutar usando el servidor incorporado
* solo funciona si tenemos php disponible desde la consola
```bash
cd mvc-simple
php -S localhost:8000 -t public
```
* En caso de usar un entorno (xampp, wamp, laragon, etc) iniciar el servidor web correspondiente (apache, nginx, etc)

En el navegador acceder a [http://localhost:8000/](http://localhost:8000/)

## Base de datos (sakila)

[Documentacion](https://dev.mysql.com/doc/sakila/en/)

[Instalacion](https://dev.mysql.com/doc/sakila/en/sakila-installation.html)

Alternativamente puede usar un cliente grafico para ejecutar el script (phpMyAdmin, Mysql Workbench, HeidiSQL, etc)

[Descarga script](https://downloads.mysql.com/docs/sakila-db.zip)