<?php
// This file generated by Propel convert-props target on 03/15/07 19:30:09
// from XML runtime conf file h:\servidor\anmaga\trunk\WEB-INF\classes\propel\runtime-conf.xml
return array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'e:\\temp\\propel.log',
    'ident' => 'mer',
    'level' => '7',
  ),
  'propel' => 
  array (
    'datasources' => 
    array (
      'mer' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'mer',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'default' => 'mer',
    ),
  ),
);