<?php
  $databases['default']['default'] = array(
    'driver' => 'mysql',
    'database' => 'camerontod',
    'username' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'prefix' => '',
 );


if (file_exists('/var/www/site-php')) {
  require('/var/www/site-php/camerontod/camerontod-settings.inc');
}
$conf['cache_backends'][] = './sites/all/modules/memcache/memcache.inc';
$conf['cache_default_class'] = 'MemCacheDrupal';
$conf['cache_class_cache_form'] = 'DrupalDatabaseCache';

