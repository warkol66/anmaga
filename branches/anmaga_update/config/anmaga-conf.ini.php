<?php
// This file generated by Propel convert-props target on 03/15/07 19:59:13
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
          'hostspec' => 'localhost:3316',
          'database' => 'anmaga2',
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
          'hostspec' => 'localhost:3316',
          'database' => 'anmaga',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'default' => 'anmaga',
    ),
  ),
);
