<?php
// This file generated by Propel convert-props target on 03/28/07 13:59:18
// from XML runtime conf file C:\Mark\Mark programas\Vertrigonew\www\anmaga\trunk\WEB-INF\classes\propel\runtime-conf.xml
return array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'e:\\temp\\propel.log',
    'ident' => 'anmaga',
    'level' => '7',
  ),
  'propel' => 
  array (
    'datasources' => 
    array (
      'anmaga' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'anmaga',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'mluse' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'anmaga',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'default' => 'anmaga',
    ),
  ),
);