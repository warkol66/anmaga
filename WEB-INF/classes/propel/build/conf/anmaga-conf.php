<?php
// This file generated by Propel convert-props target on 03/26/07 21:38:39
// from XML runtime conf file h:\servidor\anmaga\trunk\WEB-INF\classes\propel\runtime-conf.xml
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