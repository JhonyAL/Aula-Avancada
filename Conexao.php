<?php
define('HOST','localhost');
define('DB','aula_avancada');
define('USER','root');
define('PASSW', '');

$cx = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSW);