<?php
// This file generated by Propel 1.5.5 convert-conf target
// from XML runtime conf file /home/axel/dev/anmaga/WEB-INF/propel/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'anmaga' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost; dbname=',
        'user' => '',
        'password' => '',
      ),
    ),
    'mluse' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost; dbname=',
        'user' => '',
        'password' => '',
      ),
    ),
    'default' => 'anmaga',
  ),
  'debugpdo' => 
  array (
    'logging' => 
    array (
      'details' => 
      array (
        'method' => 
        array (
          'enabled' => true,
        ),
        'time' => 
        array (
          'enabled' => true,
        ),
        'mem' => 
        array (
          'enabled' => true,
        ),
      ),
    ),
  ),
  'log' => 
  array (
    'type' => 'file',
    'name' => 'propel.log',
    'ident' => 'anmaga',
    'level' => '7',
  ),
  'generator_version' => '1.5.5',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-anmaga-conf.ini.php');
return $conf;