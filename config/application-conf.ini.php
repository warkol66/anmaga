<?php
// This file generated by Propel 1.3.0 convert-props target
// from XML runtime conf file C:\apache\htdocs2\anmaga\importaciones\WEB-INF\classes\propel\runtime-conf.xml
return array_merge_recursive(array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'propel.log',
    'ident' => 'application',
    'level' => '6',
  ),
  'propel' => 
  array (
    'datasources' => 
    array (
      'application' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'dsn' => 'mysql:host=localhost; dbname=anmagaex_export',
          'user' => 'root',
          'password' => 'vertrigo',
        ),
      ),
      'default' => 'application',
    ),
    'generator_version' => '1.3.0',
  ),
), include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'application-classmap.php'));