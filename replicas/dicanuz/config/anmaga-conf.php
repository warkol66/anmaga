<?php
// This file generated by Propel convert-props target on 03/15/07 19:59:13
// from XML runtime conf file h:\servidor\anmaga\trunk\WEB-INF\classes\propel\runtime-conf.xml
return array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'propel.log',
    'ident' => 'anmaga',
    'level' => '0',
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
          'database' => 'dicanuz_anmaga',
          'username' => 'dicanuz_anmaga',
          'password' => 'anmaga',
        ),
      ),
      'mluse' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'dicanuz_anmaga',
          'username' => 'dicanuz_anmaga',
          'password' => 'anmaga',
        ),
      ),
      'default' => 'anmaga',
    ),
  ),
);
